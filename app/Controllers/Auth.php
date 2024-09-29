<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        //return view('home/template/header');
        return view('home/signin');
        //return view('home/template/footer');
    }
    public function signup()
    {
        //return view('home/template/header');
        return view('home/signup');
        //return view('home/template/footer');
    }

    //--------------------------------------------------------------------

}
