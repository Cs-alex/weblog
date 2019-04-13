<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {
		echo md5($_SERVER['HTTP_X_FORWARDED_FOR'].' + '.gethostbyaddr($_SERVER['REMOTE_ADDR']));
        //return Redirect::to('https://csalex-weblog.herokuapp.com/hu');
    }
}
