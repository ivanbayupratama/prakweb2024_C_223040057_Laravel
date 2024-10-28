<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Dashboard Blogs";
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Manage your blog on Bhadrika's web."
            ),
            'blogs' => Blogs::where('author_id', auth()->user()->id)->get(),
        ];
        return view('dashboard.blogs', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Blogs";
        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Create your blog on Bhadrika's web."
            ),
        ];
        return view('dashboard.createblogs', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogsRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs,slug',
            'article' => 'required',
            'cover' => 'required|image|file|max:10240',
        ]);
        $validatedData['uuid'] = "blog-" . Uuid::uuid4()->toString();
        $validatedData['cover'] = "https://web.bhadrikais.my.id/img/cover/1700408222_ae61d8258963afc6777c.jpg";
        $validatedData['author_id'] = auth()->user()->id;

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('cover');
        }

        Blogs::create($validatedData);

        return redirect('/dashboard/blogs')->with('success', 'New blog has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogs $blogs)
    {
        if ($blogs->user->id !== auth()->user()->id) {
            abort(403);
        }
        return redirect('/blogs/' . $blogs->slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogs $blogs)
    {
        if ($blogs->user->id !== auth()->user()->id) {
            abort(403);
        }

        $titleSEO = Str::title($blogs->title);
        $title = 'Edit Blog: ' . $blogs->title;

        $data = [
            'title' => $title,
            "SEOData" => new SEOData(
                title: $title,
                description: "Edit blog $titleSEO on Bhadrika's web."
            ),
            "blog" => $blogs
        ];

        return view('dashboard.editblogs', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogsRequest $request, Blogs $blogs)
    {
        if ($blogs->user->id !== auth()->user()->id) {
            abort(403);
        }

        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required',
            'article' => 'required',
            'cover' => 'image|file|max:10240',
        ];

        if ($request->slug != $blogs->slug) {
            $rules['slug'] = 'required|unique:blogs,slug';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('cover');
        }

        $validatedData['author_id'] = auth()->user()->id;

        Blogs::where("id", $blogs->id)->update($validatedData);

        return redirect('/dashboard/blogs')->with('success', 'Blog has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogs $blogs)
    {
        if ($blogs->user->id !== auth()->user()->id) {
            abort(403);
        }
        Blogs::destroy($blogs->id);
        return redirect('/dashboard/blogs')->with('success', 'Blog has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Blogs::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
