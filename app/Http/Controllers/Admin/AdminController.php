<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Video;

class AdminController extends Controller
{
    protected $user;

    protected function user(){
        return auth()->user();
    }

    public function index(){    $user = auth()->user();
        $role = $user->role(); // accessor

        return view('Admin.dashboard', compact('role'));
    }

    public function article(){
        $user = auth()->user();
        $role = $user->role(); // accessor

        $limit = $user->role()?->article_limit; // null = unlimited

        $articles = Article::when(
            $limit,
            fn ($q) => $q->limit($limit)
        )->get();

        return view('Admin.content.article', compact('articles', 'role'));
    }

    public function video(){
        $user = auth()->user();
        $role = $user->role(); // accessor

        $limit = $user->role()?->video_limit; // null = unlimited

        $video = Video::when(
            $limit,
            fn ($q) => $q->limit($limit)
        )->get();

        return view('Admin.content.video', compact('video', 'role'));
    }
}
