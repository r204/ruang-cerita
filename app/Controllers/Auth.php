<?php

namespace App\Controllers;

use Config\Services;
use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $data = [
            "title" => "Ruang Cerita | Sign In"
        ];
        //return view('home/template/header');
        return view('home/signin', $data);
        //return view('home/template/footer');
    }
    public function signup()
    {
        $data = [
            "title" => "Ruang Cerita | Sign Up",
            'validation' => Services::validation(),
        ];
        //return view('home/template/header');
        return view('home/signup', $data);
        //return view('home/template/footer');
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|min_length[6]|valid_email',
                'errors' => [
                    'required' => 'Email Harus Diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password Harus Diisi'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $users = new AuthModel();
        $users->insert([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'is_admin' => 0
        ]);
        session()->setFlashdata('berhasil', 'Registrasi Akun Berhasil');
        return redirect()->to('/sign-in');
    }
    //--------------------------------------------------------------------

}
