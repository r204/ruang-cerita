<?php

namespace App\Controllers;

use App\Models\CarouselModel;

helper('form');
helper('text');

class Carousel extends BaseController
{
    public function __construct()
    {
        //$this->artikelModel = new KategoriModel();
    }
    public function index()
    {
        $carouselmodel = new CarouselModel();
        $carousel = $carouselmodel->findAll();
        $data = [
            'title' => 'Ruang Cerita | Carousel',
            'carousel' => $carousel
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/carousel/index', $data);
        echo view('admin/templates/footer');
    }
    public function create()
    {
        $statuses = new StatusModel();
        $status = $statuses->findAll();
        $artikel = $this->artikelModel->findAll();
        $data = [
            'title' => 'Ruang Cerita | Artikel',
            'artikel' => $artikel,
            'categories' => $categories,
            'status' => $status
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/artikel/create',);
        echo view('admin/templates/footer');
    }
}
