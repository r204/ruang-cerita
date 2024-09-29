<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

helper('form');
helper('text');

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }
    public function index()
    {
        //$artikel = new ArtikelModel();
        $artikel = $this->artikelModel->findAll();
        $data = [
            'title' => 'RC | Artikel',
            'artikel' => $artikel
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/artikel/index');
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
