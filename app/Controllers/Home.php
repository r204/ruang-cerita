<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

helper('form');
helper('text');

class Home extends BaseController
{
	public function index()
	{
		$artikelModel = new ArtikelModel();
		$artikel = $artikelModel->findAll();
		$data = [
			'title' => 'Ruang Cerita | Home',
			'artikel' => $artikel
		];
		return view('home/home', $data);
		//return view('home/template/footer');
	}
	public function artikel()
	{
		$artikelModel = new ArtikelModel();
		$artikel = $artikelModel->show_category();
		//$kategorimodel = new KategoriModel();
		//$kategori = $kategorimodel->findAll();
		$data = [
			'title' => 'Ruang Cerita | Artikel',
			'artikel' => $artikel
		];
		//return view('home/template/header');
		return view('home/artikel', $data);
		//return view('home/template/footer');
	}
	public function detail($slug)
	{
		$this->artikel = new ArtikelModel();
		$kategorimodel = new KategoriModel();
		$kategori = $kategorimodel->findAll();
		$detail = $this->artikel->where(['slug' => $slug])->first();
		//$kategoridetail = $this->artikel->where(['slug' => $slug])->first();
		$data = [
			'title' => 'Ruang Cerita',
			'artikel' => $detail,
			'category' => $kategori
		];
		return view('/detailartikel', $data);
	}

	//--------------------------------------------------------------------

}
