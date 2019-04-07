<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AboutController extends Controller
{
    public function index() {
        $user = new User();
        $user->setUser();
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first()
        );
        return view('about.index')->with('data', $data);
    }
}
