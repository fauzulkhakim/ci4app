<?php

namespace App\Controllers;

use App\Models\KomikModel;


class Komik extends BaseController
{

    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
        ];
        return view('komik/create', $data);
    }

    public function save()
    {
        helper(['form', 'url']);

        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to(base_url() . 'komik/create')->withInput();
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to(base_url('komik'));
    }
}
