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
		return view('dashboard.index');
    }
}