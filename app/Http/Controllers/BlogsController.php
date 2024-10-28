<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Comments;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Egulias\EmailValidator\Parser\Comment;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class BlogsController extends Controller
{
    //

    public function index()
    {
        // dd(request()->search);

        $blogs = Blogs::with(['user'])->latest();
        $title = "Blogs";
        $data = [
            'blogs' => $blogs->filter(request(['search', 'author']))->paginate(4)->withQueryString(),
            'title' => $title,
            'SEOData' => new SEOData(
                title: $title,
                description: "Explore Bhadrika's personal blog with insightful posts on various topics.'",
            ),
        ];
        return view('main.blogs', $data);
    }

    public function detail(Blogs $blogs)
    {
        $blogs = $blogs->load(['user', 'comments']);
        $data = [
            'title' => Str::title($blogs->title),
            'blog' => $blogs,
            'comments' => $blogs->comments->load('reply', 'user'),
            'meta' => $blogs
        ];
        return view('main.blogsdetail', $data);
    }

    public function replyComment(Blogs $blog, Comments $comment)
    {

        // dd([
        //     'id_comment' => $comment->id,
        //     'blog' => $blog->id,
        //     'blog_comment' => $comment->blog->first()->id,
        //     'blog_name' => $blog->slug,
        //     'comment_name' => $comment->blog->first()->id,

        // ]);

        if ($blog->id !== $comment->blog->first()->id || !auth()->check()) {
            abort(403);
        }

        $validatedData = request()->validate([
            'comment' => 'required|max:100',
        ]);

        $validatedData['replyto'] = $comment->id;
        $validatedData['content'] = $blog->uuid;
        $validatedData['hash_id'] = hash('sha256', mt_rand(1, 1000) . $validatedData['content'] . $validatedData['comment']);
        $validatedData['user_id'] = auth()->user()->id;

        $theComment = Comments::create($validatedData);
        $blog->comments()->save($theComment);

        return redirect()->to(url('/blogs/' . $blog->slug))->with('success', 'comment has been added');
    }

    public function insertComment(Blogs $blog)
    {

        if (!$blog->id || !auth()->check()) {
            abort(403);
        }

        $validatedData = request()->validate([
            'comment' => 'required|max:100',
        ]);

        $validatedData['content'] = $blog->uuid;
        $validatedData['hash_id'] = hash('sha256', mt_rand(1, 1000) . $validatedData['content'] . $validatedData['comment']);
        $validatedData['user_id'] = auth()->user()->id;

        $theComment = Comments::create($validatedData);
        $blog->comments()->save($theComment);

        return redirect()->to(url('/blogs/' . $blog->slug))->with('success', 'comment has been added');
    }

    public function deleteComment(Blogs $blog, Comments $comment)
    {

        // dd([
        //     'id_comment' => $comment->id,
        //     'blog' => $blog->id,
        //     'blog_comment' => $comment->blog->first()->id,
        //     'blog_name' => $blog->slug,
        //     'comment_name' => $comment->blog->first()->id,

        // ]);

        if ($blog->id !== $comment->blog->first()->id || !auth()->check() || auth()->user()->id !== $comment->user->id) {
            abort(403);
        }

        Comments::destroy($comment->id);
        $blog->comments()->detach($comment);

        return redirect()->to(url('/blogs/' . $blog->slug))->with('success', 'comment has been deleted');
    }
}
