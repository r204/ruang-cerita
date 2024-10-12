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

    public function save()
    {
        $this->kategorimodel = new KategoriModel;
        //$data = new KategoriModel();
        $data = [
            'category' => $this->request->getPost('category')
        ];
        ($this->request->getVar($data));


        $success = $this->kategorimodel->tambah($data);
        if ($success) {
            session()->setFlashdata('berhasil', 'Kategori berhasil dibuat!');
            return redirect()->to('admin.kategori');
        }
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
