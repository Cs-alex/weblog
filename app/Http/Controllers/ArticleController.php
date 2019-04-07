<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Article;
use App\User;
use Request;

class ArticleController extends Controller
{
    public function article($lang, $article) {
        App()->setlocale(Request::segment(1));
        $user = new User();
        $user->setUser();
        $user_id = $user->getUserId();
        $article_id = $this->getArticleId($lang, $article);
        if ($article_id) {
            $data = array(
                'lang' => $lang,
                'scheme' => DB::table('visitors')->select('color_scheme')->first(),
                'article' => Article::where('id', $article_id->id)->first(),
                'vote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote, count(downvote) as downvote'))->where([['visitor_id', '=', $user_id->id], ['article_id', '=', $article_id->id]])->first(),
                'upvote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote'))->where('article_id', $article_id->id)->first(),
                'downvote' => DB::table('article__vote')->select(DB::raw('count(downvote) as downvote'))->where('article_id', $article_id->id)->first(),
                'visitor' => DB::table('article__visitor')->select(DB::raw('count(visitor_id) as visitor'))->where('article_id', $article_id->id)->first()
            );
            return view('articles.index')->with('data', $data);
        } else {
            $data = array(
                'lang' => $lang,
                'scheme' => DB::table('visitors')->select('color_scheme')->first()
            );
            return view('errors.404')->with('data', $data);
        }
    }

    public function getArticleId($lang, $article) {
        return $article_id = Article::select('id')->where('seo_'.$lang, $article)->first();
    }

    /*public function basics() {
        $user = new User();
        $user->setUser();
        if (Request::segment(1) != 'hu' || Request::segment(1) != 'en') {
            return redirect('http://localhost/weblog/hu');
            //App()->setlocale('hu');
        } else {
            App()->setlocale(Request::segment(1));
        }
    }*/
}