<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Sign In"
        ];
        //return view('home/template/header');
        return view('home/signin', $data);
        //return view('home/template/footer');
    }
    public function signup()
    {
        $data = [
            "title" => "Sign Up"
        ];
        //return view('home/template/header');
        return view('home/signup', $data);
        //return view('home/template/footer');
    }

    //--------------------------------------------------------------------

}
