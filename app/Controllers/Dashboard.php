<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $artikelModel = new ArtikelModel();
        $artikel = $artikelModel->findAll();
        $data = [
            'title' => 'Ruang Cerita | Dashboard',
            'artikel' => $artikel
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
