<?php

namespace App\Controllers;

//use App\Models\ArtikelModel;
use App\Models\KategoriModel;

helper('form');
helper('text');

class Kategori extends BaseController
{
    public function __construct()
    {
        //$this->artikelModel = new KategoriModel();
    }
    public function index()
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
    public function create()
    {
        $category = new KategoriModel();
        $categories = $category->findAll();
        $artikel = $this->artikelModel->findAll();
        $data = [
            'title' => 'Ruang Cerita | Artikel',
            'artikel' => $artikel,
            'categories' => $categories
        ];
        echo view('admin/templates/header', $data);
        echo view('admin/artikel/create',);
        echo view('admin/templates/footer');
    }
    public function save()
    {
        helper('date');
        $now = now();
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
            'category' => $this->request->getVar('category'),
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

        $this->artikel = new ArtikelModel();
        $foto = $this->artikel->find($id);
        $foto2 = $this->artikel->find($id);
        unlink('img/artikel/' . $foto->img1);
        unlink('img/artikel/' . $foto2->img2);

        $this->artikel->where(['id' => $id])->delete();
        session()->setFlashdata('sukses', 'Artikel berhasil dihapus');
        return redirect()->to('admin.artikel');
    }

    public function edit($slug)
    {
        $this->model = new ArtikelModel();
        $data = [
            'title' => 'Form Edit Artikel',
            'validation' => \config\Services::validation(),
            'artikel' => $this->model->getArtikel($slug)
        ];
        echo view('admin/layout/header', $data);
        echo view('admin/layout/top_menu');
        echo view('admin/layout/side_menu');
        return view('admin/artikel/edit', $data);
        echo view('admin/layout/footer');
    }
    public function update($id)
    {
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
            ]

        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $filefoto = $this->request->getFile('img');
        if ($filefoto->getError() == 4) {
            $filename = $this->request->getVar('imglama');
        } else {
            $filefoto->move('img/artikel');
            unlink('img/artikel/' . $this->request->getVar('imglama'));
            $filename = $filefoto->getName();
        }

        $artikel = new ArtikelModel();
        $slug = url_title($this->request->getVar('judul'), '-', true);
        //dd($this->request->getVar());
        $artikel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'body' => $this->request->getVar('body'),
            'img' => $filename
        ]);
        session()->setFlashdata('updated', 'Artikel berhasil diupdate');
        return redirect()->to('admin.artikel');
    }

    //--------------------------------------------------------------------

}
