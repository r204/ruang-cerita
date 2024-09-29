<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

helper('form');
helper('text');

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'RC | Home'
		];
		return view('home/home', $data);
		//return view('home/template/footer');
	}
	public function artikel()
	{
		$artikelModel = new ArtikelModel();
		$artikel = $artikelModel->findAll();
		$data = [
			'title' => 'RC | Artikel',
			'artikel' => $artikel
		];
		//return view('home/template/header');
		return view('home/artikel', $data);
		//return view('home/template/footer');
	}

	//--------------------------------------------------------------------

}
