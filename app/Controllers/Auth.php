<?php

namespace App\Controllers;

use Config\Services;
use App\Models\AuthModel;

helper('date');
helper('form');
helper('text');
helper('url');
class Auth extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        session();
        $data = [
            'title' => 'Ruang Cerita | Login',
            'validation' => \Config\Services::validation()
        ];
        //return view('home/template/header');
        return view('home/signin', $data);
        //return view('home/template/footer');
    }

    public function login()
    {
        $session = session();
        $user = new AuthModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $user->where('email', $email)->first();
        //dd($this->request->getVar($pass));
        if ($data) {
            $pass = $data['password'];
            $verify = password_verify($password, $pass);
            $role = $data['is_admin'];
            if ($verify && $role == '1') {
                $ses_data = [
                    'logged_in' => true,
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'role' => $data['is_admin'],
                    'email' => $data['email'],
                    'password' => $data['password']
                ];
                session()->set($ses_data);
                $session->set($ses_data);
                return redirect()->to('/admin.dashboard');
            } elseif ($verify && $role == '0') {
                $ses_data = [
                    'logged_in' => true,
                    'id' => $data['id'],
                    'nama' => $data['nama'],
                    'role' => $data['is_admin'],
                    'email' => $data['email'],
                    'password' => $data['password']
                ];
                session()->set($ses_data);
                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Akun Anda Tidak Tersedia');
            return redirect()->back();
        }
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
        $now = date('Y-m-d H:i:s', now());
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
            'created_at' => $now
        ]);
        session()->setFlashdata('berhasil', 'Registrasi Akun Berhasil');
        return redirect()->to('/sign-in');
    }
    //--------------------------------------------------------------------
    public function logout()
    {
        $session = session();
        $session->destroy();
        //session()->destroy();
        return redirect()->to('/');
    }
}
