<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Ramsey\Uuid\Uuid;
use App\Models\Timeline;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Ramsey\Uuid\Rfc4122\UuidV4;
use App\Http\Requests\StoreTimelineRequest;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use App\Http\Requests\UpdateTimelineRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DashboardTimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Dashboard Timeline";
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Manage your timeline on Bhadrika's web."
            ),
            'timeline' => Timeline::where('author_id', auth()->user()->id)->get(),
        ];
        return view('dashboard.timelines', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Timeline";
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Create your timeline on Bhadrika's web."
            ),
        ];
        return view('dashboard.createtimeline', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimelineRequest $request)
    {
        $validatedData = $request->validate([
            "content" => 'required|file|max:102400|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,image/jpeg,image/jpg,image/png',
            'title' => 'max:255',
            'music_id' => 'required',
            'title_music' => 'required',
            'cover_music' => 'required',
            'artist_music' => 'required',
            'streamurl_music' => 'required',
        ]);


        if ($request->file('content')) {
            // dd($uploadedFileUrl);
            // $validatedData['content'] = $request->file('content')->store('contents');
            $validatedData['content'] = Cloudinary::uploadFile($request->file('content')->getRealPath())->getPublicId();
            $validatedData['slug'] = Uuid::uuid4()->toString();
            $datafile = explode('/', $request->file('content')->getMimeType());
            if ($datafile[0] == "image") {
                $validatedData['is_video'] = false;
            } else {
                $validatedData['is_video'] = true;
            }
        }


        // INSERTING MUSIC
        $musicModel = new Music;
        $validatedMusic = [
            'title' => $validatedData['title_music'],
            'cover' => $validatedData['cover_music'],
            'artist' => $validatedData['artist_music'],
            'stream_url' => $validatedData['streamurl_music'],
        ];

        if ($request->music_id !== "creator_audio" || $request->music_id == "creator_audio") {
            $validatedData['music_id_ori'] = $validatedData['slug'];
            $validatedMusicOri = [
                'music_id' =>  $validatedData['music_id_ori'],
                'title' => "Original Audio " . $validatedData['title'],
                'cover' => 'storage/assets/logo.png',
                'artist' => auth()->user()->username,
                'stream_url' => $validatedData['content'],
            ];
            if (!$musicModel->where('music_id', $validatedMusicOri['music_id'])->first()) {
                $musicModel->create($validatedMusicOri);
            }
            if ($request->music_id !== "creator_audio") {
                $validatedData['music_id'] = $validatedData['music_id'];
            } else {
                $validatedData['music_id'] = $validatedMusicOri['music_id'];
            }

            if ($request->music_id !== "creator_audio") {
                $validatedMusic['music_id'] = $validatedData['music_id'];
                if (!$musicModel->where('music_id', $validatedData['music_id'])->first()) {
                    $musicModel->create($validatedMusic);
                }
            }
        }

        // KONTEN
        $validatedContent = [
            'slug' =>   $validatedData['slug'],
            'judul' => $validatedData['title'],
            'content' => $validatedData['content'],
            'is_video' => $validatedData['is_video'],
            'author_id' => auth()->user()->id,
            'music_id' => $musicModel->where('music_id', $validatedData['music_id'])->first()->id,
        ];
        if ($request->is_muted == "on") {
            $validatedContent['is_muted'] = true;
        }
        Timeline::create($validatedContent);
        return redirect('/dashboard/timeline')->with('success', 'New content has been posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeline $timeline)
    {
        if (auth()->user()->id !== $timeline->user->id) {
            abort('403');
        }
        return redirect('/timeline/' . $timeline->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeline $timeline)
    {

        if (auth()->user()->id !== $timeline->user->id) {
            abort('403');
        }

        $titleSEO = Str::title($timeline->judul);
        $title = 'Edit Timeline: ' . $timeline->judul;
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Edit timeline $titleSEO on Bhadrika's web."
            ),
            "timeline" => $timeline
        ];
        return view('dashboard.edittimelines', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimelineRequest $request, Timeline $timeline)
    {
        if (auth()->user()->id !== $timeline->user->id) {
            abort('403');
        }

        // dd($request->is_muted);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'music_id' => 'required',
            'title_music' => 'required',
            'cover_music' => 'required',
            'artist_music' => 'required',
            'streamurl_music' => 'required',
        ]);


        if ($request->file('content')) {
            $validatedData['content'] = $request->file('content')->store('contents');
            $datafile = explode('/', $request->file('content')->getMimeType());
            if ($datafile[0] == "image") {
                $validatedData['is_video'] = false;
            } else {
                $validatedData['is_video'] = true;
            }
        }


        // INSERTING MUSIC
        $musicModel = new Music;
        $validatedMusic = [
            'title' => $validatedData['title_music'],
            'cover' => $validatedData['cover_music'],
            'artist' => $validatedData['artist_music'],
            'stream_url' => $validatedData['streamurl_music'],
        ];

        if ($request->music_id !== "creator_audio" || $request->music_id == "creator_audio") {
            if ($request->music_id !== "creator_audio") {
                $validatedData['music_id'] = $validatedData['music_id'];
            } else {
                $validatedData['music_id'] = $timeline->slug;
            }

            if ($request->music_id !== "creator_audio") {
                $validatedMusic['music_id'] = $validatedData['music_id'];
                if (!$musicModel->where('music_id', $validatedData['music_id'])->first()) {
                    $musicModel->create($validatedMusic);
                }
            }
        }

        // KONTEN
        $validatedContent = [
            'judul' => $validatedData['title'],
            'music_id' => $musicModel->where('music_id', $validatedData['music_id'])->first()->id,
        ];
        if ($request->is_muted == "on") {
            $validatedContent['is_muted'] = true;
        } else {
            $validatedContent['is_muted'] = false;
        }
        $timeline->where('id', $timeline->id)->update($validatedContent);
        return redirect('/dashboard/timeline')->with('success', 'Content has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeline $timeline)
    {
        if (auth()->user()->id !== $timeline->user->id) {
            abort('403');
        }


        Timeline::destroy($timeline->id);
        return redirect('/dashboard/timeline')->with('success', 'Content has been deleted!');
    }
}
