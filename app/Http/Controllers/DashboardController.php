<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Article;
use App\Component;
use App\Vote;
use App\Visitor;
use App\User;
use Redirect;
use Request;

class DashboardController extends Controller
{
    public function index() {
		$data = array();
		return view('dashboard.index')->with('data', $data);
		/*
        $this->basics();
        $pages = array('', 'newest', 'favorite', 'most-viewed');
        $data['lang'] = session('lang');
        $data['scheme'] = DB::table('visitors')->select('color_scheme')->first();
        if (in_array(Request::segment(2), $pages)) {
            if (Request::segment(2) == NULL || Request::segment(2) == 'newest') {
                $order_by = "ORDER BY article.created_at DESC";
            } elseif (Request::segment(2) == 'favorite') {
                $order_by = "ORDER BY upvote DESC";
            } elseif (Request::segment(2) == 'most-viewed') {
                $order_by = "ORDER BY visitor DESC";
            }
            $data['article'] = DB::select("
                SELECT article.*,
                (SELECT article__component.article_text_".$data['lang']."
                    FROM article__component
                    WHERE article__component.article_text_".$data['lang']." IS NOT NULL AND article__component.article_id = article.id
                    LIMIT 1) AS txt,
                (SELECT article__component.article_image
                    FROM article__component
                    WHERE article__component.article_image IS NOT NULL AND article__component.article_id = article.id
                    LIMIT 1) AS img,
                (SELECT COUNT(article__vote.upvote)
                    FROM article__vote
                    WHERE article__vote.article_id = article.id) AS upvote,
                (SELECT COUNT(article__vote.downvote)
                    FROM article__vote
                    WHERE article__vote.article_id = article.id) AS downvote,
                (SELECT COUNT(article__visitor.visitor_id)
                    FROM article__visitor
                    WHERE article__visitor.article_id = article.id) AS visitor
                FROM article
                GROUP BY article.id
                ".$order_by."
            ");
            return view('dashboard.index')->with('data', $data);
        } elseif (Request::segment(2) == 'about') {
            return view('about.index')->with('data', $data);
        } else {
            return view('errors.404')->with('data', $data);
        }
		*/
    }

    public function search($search) {
        $this->basics();
        $data['lang'] = session('lang');
        $data['scheme'] = DB::table('visitors')->select('color_scheme')->first();
        $data['article'] = DB::select("
            SELECT article.*,
            (SELECT article__component.article_text_".$data['lang']."
                FROM article__component
                WHERE article__component.article_text_".$data['lang']." IS NOT NULL AND article__component.article_id = article.id
                LIMIT 1) AS txt,
            (SELECT article__component.article_image
                FROM article__component
                WHERE article__component.article_image IS NOT NULL AND article__component.article_id = article.id
                LIMIT 1) AS img,
            (SELECT COUNT(article__vote.upvote)
                FROM article__vote
                WHERE article__vote.article_id = article.id) AS upvote,
            (SELECT COUNT(article__vote.downvote)
                FROM article__vote
                WHERE article__vote.article_id = article.id) AS downvote,
            (SELECT COUNT(article__visitor.visitor_id)
                FROM article__visitor
                WHERE article__visitor.article_id = article.id) AS visitor
            FROM article
            INNER JOIN article__component ON article.id = article__component.article_id
            WHERE article.title_".$data['lang']." LIKE '%".Request::segment(3)."%' OR article__component.article_text_".$data['lang']." LIKE '%".Request::segment(3)."%'
            GROUP BY article.id
            ORDER BY article.created_at DESC
        ");
        return view('dashboard.index')->with('data', $data);
    }

    public function basics() {
        $user = new User();
        $user->setUser();
        if (Request::segment(1) == 'en') {
            session(['lang' => 'en']);
        } else {
            session(['lang' => 'hu']);
        }
        App()->setlocale(session('lang'));
    }
}