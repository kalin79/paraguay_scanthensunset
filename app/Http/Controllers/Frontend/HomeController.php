<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd(request()->ip());
        return view('pages.frontend.inicio');
    }

    public function participar()
    {

        // echo $_SERVER['REMOTE_ADDR']; 
        // echo "<br>";
        // echo $_SERVER['HTTP_X_FORWARDED_FOR'];
        // dd(getUserIpAddr());

        return view('pages.frontend.participar');
    }

    public function foto()
    {

        return view('pages.frontend.foto');
    }

    public function resultado()
    {

        return view('pages.frontend.resultado');
    }

    public function preresultado()
    {

        return view('pages.frontend.preresultado');
    }

    public function error()
    {

        return view('pages.frontend.error');
    }

    public function error2()
    {

        return view('pages.frontend.error2');
    }

    public function thankyou()
    {

        return view('pages.frontend.gracias');
    }

}
