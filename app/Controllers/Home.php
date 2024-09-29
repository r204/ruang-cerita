<?php

namespace App\Controllers;

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
		//return view('home/template/header');
		return view('home/artikel');
		//return view('home/template/footer');
	}

	//--------------------------------------------------------------------

}
