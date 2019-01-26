<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Vote;
use App\User;
use App\Visitor;

class ArticleController extends Controller
{
    public function article($article) {
        $user = new User();
        $user->setUser();
        $user_id = $user->getUserId();
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first(),
            'article' => Article::where('seo', $article)->first(),
            'vote' => Vote::select('upvote', 'downvote')->where('visitor_id', $user_id->id)->first(),
            'upvote' => Vote::select('upvote')->where('article_id', 7)->count(),
            'downvote' => Vote::select('downvote')->where('article_id', 7)->count(),
            'visitor' => Visitor::select('visitor_id')->where('article_id', 7)->count()
        );
        return view('articles.index')->with('data', $data);
    }
}
