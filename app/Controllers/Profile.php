<?php

namespace App\Controllers;

//use App\Models\ArtikelModel;
use App\Models\AuthModel;

helper('form');
helper('text');

class Profile extends BaseController
{
    public function __construct()
    {
        //$this->artikelModel = new KategoriModel();
    }
    public function index()
    {
        $profilemodel = new AuthModel();
        $profile = $profilemodel->findAll();
        $data = [
            'title' => 'Ruang Cerita | Profile',
            'profile' => $profile
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/profile', $data);
        echo view('admin/templates/footer');
    }
    public function profile()
    {
        //$artikel = new ArtikelModel();
        //$artikel = $this->artikelModel->show_category();
        $kategoris = new KategoriModel();
        $kategori = $kategoris->findAll();
        $data = [
            'title' => 'Ruang Cerita | Kategori',
            'kategori' => $kategori
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/kategori/index', $data);
        echo view('admin/templates/footer');
    }


    //--------------------------------------------------------------------

}
