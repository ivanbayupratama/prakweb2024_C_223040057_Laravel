<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Timeline;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class TimelineController extends Controller
{
    public function index()
    {

        $title = "Timeline";
        $data = [
            'title' => $title,
            'timelines' => Timeline::with(['comments', 'user', 'music'])->latest()->get(),
            'SEOData' => new SEOData(
                title: $title,
                description: "Explore Bhadrika's personal story with insightful video or photo.'",
            ),
        ];
        return view('main.timeline', $data);
    }

    public function detail(Timeline $timeline)
    {
        $judul = Str::title($timeline->judul);
        $timeline = $timeline->load('comments', 'user', 'music');
        $data = [
            'title' => "Timeline: " . $judul,
            'timeline' => $timeline,
            'meta' => $timeline
        ];

        return view('main.timelinedetail', $data);
    }

    public function replyComment(Timeline $timeline, Comments $comment)
    {

        // dd([
        //     'id_comment' => $comment->id,
        //     'blog' => $timeline->id,
        //     'blog_comment' => $comment->timeline->first()->id,
        //     'blog_name' => $timeline->slug,
        //     'comment_name' => $comment->timeline->first()->id,

        // ]);

        if ($timeline->id !== $comment->timeline->first()->id || !auth()->check()) {
            abort(403);
        }

        $validatedData = request()->validate([
            'comment' => 'required|max:100',
        ]);

        $validatedData['replyto'] = $comment->id;
        $validatedData['content'] = $timeline->uuid;
        $validatedData['hash_id'] = hash('sha256', mt_rand(1, 1000) . $validatedData['content'] . $validatedData['comment']);
        $validatedData['user_id'] = auth()->user()->id;

        $theComment = Comments::create($validatedData);
        $timeline->comments()->save($theComment);

        return redirect()->to(url('/timeline/' . $timeline->slug))->with('success', 'comment has been added');
    }

    public function insertComment(Timeline $timeline)
    {

        if (!$timeline->id || !auth()->check()) {
            abort(403);
        }

        $validatedData = request()->validate([
            'comment' => 'required|max:100',
        ]);

        $validatedData['content'] = $timeline->uuid;
        $validatedData['hash_id'] = hash('sha256', mt_rand(1, 1000) . $validatedData['content'] . $validatedData['comment']);
        $validatedData['user_id'] = auth()->user()->id;

        $theComment = Comments::create($validatedData);
        $timeline->comments()->save($theComment);

        return redirect()->to(url('/timeline/' . $timeline->slug))->with('success', 'comment has been added');
    }

    public function deleteComment(Timeline $timeline, Comments $comment)
    {

        // dd([
        //     'id_comment' => $comment->id,
        //     'blog' => $timeline->id,
        //     'blog_comment' => $comment->timeline->first()->id,
        //     'blog_name' => $timeline->slug,
        //     'comment_name' => $comment->timeline->first()->id,

        // ]);

        if ($timeline->id !== $comment->timeline->first()->id || !auth()->check() || auth()->user()->id !== $comment->user->id) {
            abort(403);
        }

        Comments::destroy($comment->id);
        $timeline->comments()->detach($comment);

        return redirect()->to(url('/timeline/' . $timeline->slug))->with('success', 'comment has been deleted');
    }
}
