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
		echo $_SERVER['HTTP_X_FORWARDED_FOR'].' + '.gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR']);
		echo '<br>';
		echo md5($_SERVER['HTTP_X_FORWARDED_FOR'].' + '.gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR']));
		echo '<br>';
		echo md5($_SERVER['HTTP_X_FORWARDED_FOR']);
        //return Redirect::to('https://csalex-weblog.herokuapp.com/hu');
    }
}
