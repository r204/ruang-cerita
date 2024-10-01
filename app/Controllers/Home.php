<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

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
		$artikel = $artikelModel->findAll();
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
		$detail = $this->artikel->where(['slug' => $slug])->first();
		$data = [
			'title' => 'Ruang Cerita',
			'artikel' => $detail
		];
		return view('/detailartikel', $data);
	}

	//--------------------------------------------------------------------

}
