<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Signin";
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Let's vibe together!"
            ),
        ];
        return view('oauth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => "required|alpha_dash:ascii|min:5|max:255",
            'password' => "required|min:5",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Username or password is invalid');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/signin');
    }


    // API SSO
    public function callback(string $token = null, Request $request)
    {
        if ($token !== null) {
            try {
                $client = new Client();
                $api = $client->request('POST', 'https://sso.bhadrikais.my.id//otentikasi/login/' . env('TOKEN_DIAKUN'), [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ]
                ]);
                $json = json_decode($api->getBody(), true);
                if ($json['status'] == 200 && $json['isLoggedIn'] == true) {
                    $user = User::where('uuid', $json['data']['uuid'])->first();
                    $passRandom = fake()->password('20');
                    if (!$user) {
                        $data = [
                            'uuid' => $json['data']['uuid'],
                            'fullname' => $json['data']['fullname'],
                            'username' => $json['data']['username'],
                            'email' => $json['data']['email'],
                            'password' => Hash::make($json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom),
                            'image' => $json['data']['image'],
                            'is_admin' => false,
                        ];
                        User::create($data);
                    } else {
                        $data = [
                            'fullname' => $json['data']['fullname'],
                            'username' => $json['data']['username'],
                            'email' => $json['data']['email'],
                            'password' => Hash::make($json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom),
                            'image' => $json['data']['image'],
                        ];
                        User::where('uuid', $json['data']['uuid'])->update($data);
                    }

                    $credentials = [
                        'username' => $json['data']['username'],
                        'password' => $json['data']['uuid'] . $json['data']['username'] . $json['data']['email'] . "diakun" . $passRandom,
                    ];

                    // dd($credentials);
                    if (Auth::attempt($credentials)) {
                        $request->session()->regenerate();
                        return redirect()->intended('/dashboard');
                    }
                }
                return back()->with('error', "You are not loggedin!");
            } catch (Exception $e) {
                return back()->with('error', "Something wrong!");
            }
        }
        return redirect('/signin');
    }
}
