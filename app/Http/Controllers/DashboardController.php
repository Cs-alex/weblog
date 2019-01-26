<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Article;
use App\Component;
use App\Vote;
use App\Visitor;
use App\User;

class DashboardController extends Controller
{
    public function index() {
        $user = new User();
        $user->setUser();
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first(),
            'article' => Article::all()->sortByDesc('created_at')
        );
        return view('dashboard.index')->with('data', $data);
    }

    public function search($search) {
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first(),
            'article' => Article::where('title', 'like', '%'.$search.'%')->get()
        );
        return view('dashboard.index')->with('data', $data);
    }
}
