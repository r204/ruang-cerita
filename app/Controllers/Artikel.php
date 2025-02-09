<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\StatusModel;

$session = \Config\Services::session();

helper('date');
helper('form');
helper('text');
helper('url');


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
            'title' => 'Ruang Cerita | Artikel',
            'artikel' => $artikel
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/artikel/index', $data);
        echo view('admin/templates/footer');
    }
    public function create()
    {
        $category = new KategoriModel();
        $categories = $category->findAll();
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
    public function save()
    {
        $now = date('Y-m-d H:i:s', now());
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Harus Diisi'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Artikel Harus Diisi'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Artikel Harus Diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Artikel Harus Diisi'
                ]
            ],

        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $filefoto = $this->request->getFile('img1');
        $filefoto2 = $this->request->getFile('img2');

        //get foto
        $filefoto->move('img/artikel');
        $filefoto2->move('img/artikel');
        $filename = $filefoto->getName();
        $filename2 = $filefoto2->getName();

        $artikel = new ArtikelModel();
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $artikel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => session()->get('nama'),
            'category' => $this->request->getVar('category'),
            'status' => $this->request->getVar('status'),
            'body' => $this->request->getVar('body'),
            'img1' => $filename,
            'img2' => $filename2,
            'created_at' => $now,
            'updated_at' => $now
        ]);
        //dd($this->request->getVar($artikel));
        session()->setFlashdata('berhasil', 'Artikel berhasil dibuat!');
        return redirect()->to('admin.artikel');
    }
    public function delete($id)
    {
        $this->artikelmodel = new ArtikelModel();
        $this->artikelmodel->find($id);
        $artikel = $this->artikelmodel->find($id);

        unlink('img/artikel/' . $artikel->img1);
        unlink('img/artikel/' . $artikel->img2);

        $this->artikelmodel->where(['id' => $id])->delete();
        //if ($artikel) {
        //$artikelmodel->delete($id);
        session()->setFlashdata('sukses', 'Artikel berhasil dihapus');
        return redirect()->to('/admin.artikel');
        //}
    }

    public function edit($slug)
    {
        $category = new KategoriModel();
        $categories = $category->findAll();
        $statuses = new StatusModel();
        $status = $statuses->findAll();
        $this->model = new ArtikelModel();
        $data = [
            'title' => 'Form Edit Artikel',
            'validation' => \config\Services::validation(),
            'artikel' => $this->model->getArtikel($slug),
            'categories' => $categories,
            'status' => $status
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/artikel/edit', $data);
        echo view('admin/templates/footer');
    }
    public function update($id)
    {
        $now = date('Y-m-d H:i:s', now());
        $rules = [
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Harus Diisi'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Artikel Harus Diisi'
                ]
            ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Artikel Harus Diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status Artikel Harus Diisi'
                ]
            ],

        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $filefoto1 = $this->request->getFile('img1');
        $filefoto2 = $this->request->getFile('img2');
        if ($filefoto1->getError() == 4) {
            $filename1 = $this->request->getVar('imglama1');
            $filename2 = $this->request->getVar('imglama2');
        } else {
            $filefoto1->move('img/artikel');
            $filefoto2->move('img/artikel');
            //unlink('img/artikel/' . $this->request->getVar('imglama1'));
            //unlink('img/artikel/' . $this->request->getVar('imglama2'));
            $filename1 = $filefoto1->getName();
            $filename2 = $filefoto2->getName();
        }

        $artikel = new ArtikelModel();
        $slug = url_title($this->request->getVar('judul'), '-', true);
        //dd($this->request->getVar());
        $artikel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'author' => session()->get('nama'),
            'category' => $this->request->getVar('category'),
            'status' => $this->request->getVar('status'),
            'body' => $this->request->getVar('body'),
            'img1' => $filename1,
            'img2' => $filename2,
            'updated_at' => $now
        ]);
        session()->setFlashdata('updated', 'Artikel berhasil diupdate');
        return redirect()->to('admin.artikel');
    }

    //--------------------------------------------------------------------

}
