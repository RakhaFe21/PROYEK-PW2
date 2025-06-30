<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    // Form feedback untuk user
    public function form()
    {
        $data = [
            'title' => 'Kirim Feedback',
            'validation' => \Config\Services::validation()
        ];
        return view('feedback/form', $data);
    }

    // Proses simpan feedback
    public function store()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama maksimal 100 karakter'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'valid_email' => 'Format email tidak valid',
                    'max_length' => 'Email maksimal 100 karakter'
                ]
            ],
            'message' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Pesan harus diisi',
                    'min_length' => 'Pesan minimal 5 karakter'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->feedbackModel->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message')
        ]);

        return redirect()->to('feedback/form')->with('success', 'Feedback berhasil dikirim!');
    }

    // List feedback untuk admin
    public function index()
    {
        $data = [
            'title' => 'Daftar Feedback',
            'feedbacks' => $this->feedbackModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('feedback/list', $data);
    }

    // Hapus feedback
    public function delete($id = null)
    {
        $feedback = $this->feedbackModel->find($id);
        if (!$feedback) {
            return redirect()->to('feedback')->with('error', 'Feedback tidak ditemukan!');
        }
        $this->feedbackModel->delete($id);
        return redirect()->to('feedback')->with('success', 'Feedback berhasil dihapus!');
    }
} 