<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class ArtikelController extends BaseController
{
    protected $articleModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'articles' => $this->articleModel->orderBy('created_at', 'DESC')->findAll()
        ];
        
        return view('artikel/list', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Artikel Baru',
            'validation' => \Config\Services::validation()
        ];
        
        return view('artikel/form', $data);
    }

    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Judul artikel harus diisi',
                    'min_length' => 'Judul minimal 3 karakter',
                    'max_length' => 'Judul maksimal 255 karakter'
                ]
            ],
            'content' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Konten artikel harus diisi',
                    'min_length' => 'Konten minimal 10 karakter'
                ]
            ],
            'status' => [
                'rules' => 'required|in_list[draft,published]',
                'errors' => [
                    'required' => 'Status harus dipilih',
                    'in_list' => 'Status tidak valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'status' => $this->request->getPost('status')
        ];

        $this->articleModel->insert($data);

        return redirect()->to('artikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id = null)
    {
        $article = $this->articleModel->find($id);
        
        if (!$article) {
            return redirect()->to('artikel')->with('error', 'Artikel tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Artikel',
            'article' => $article,
            'validation' => \Config\Services::validation()
        ];
        
        return view('artikel/form', $data);
    }

    public function update($id = null)
    {
        $article = $this->articleModel->find($id);
        
        if (!$article) {
            return redirect()->to('artikel')->with('error', 'Artikel tidak ditemukan!');
        }

        // Validasi input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Judul artikel harus diisi',
                    'min_length' => 'Judul minimal 3 karakter',
                    'max_length' => 'Judul maksimal 255 karakter'
                ]
            ],
            'content' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Konten artikel harus diisi',
                    'min_length' => 'Konten minimal 10 karakter'
                ]
            ],
            'status' => [
                'rules' => 'required|in_list[draft,published]',
                'errors' => [
                    'required' => 'Status harus dipilih',
                    'in_list' => 'Status tidak valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'status' => $this->request->getPost('status')
        ];

        $this->articleModel->update($id, $data);

        return redirect()->to('artikel')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function delete($id = null)
    {
        $article = $this->articleModel->find($id);
        
        if (!$article) {
            return redirect()->to('artikel')->with('error', 'Artikel tidak ditemukan!');
        }

        $this->articleModel->delete($id);

        return redirect()->to('artikel')->with('success', 'Artikel berhasil dihapus!');
    }
} 