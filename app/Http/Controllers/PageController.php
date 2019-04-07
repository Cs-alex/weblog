<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function dtb() {
        // echo Article::all();
        $articles = Article::find(1)->parts;
        foreach($articles as $article) {
            echo $article->part.'<br>';
        }
    }
}
