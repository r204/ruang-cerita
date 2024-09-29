<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RC | Dashboard'
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/dashboard/dashboard');
        echo view('admin/templates/footer');
    }
    public function artikel()
    {
        //return view('home/template/header');
        return view('home/artikel');
        //return view('home/template/footer');
    }

    //--------------------------------------------------------------------

}
