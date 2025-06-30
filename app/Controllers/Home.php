<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\FeedbackModel;

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();
        $feedbackModel = new FeedbackModel();
        
        $data = [
            'title' => 'Dashboard',
            'total_articles' => $articleModel->countAll(),
            'published_articles' => $articleModel->where('status', 'published')->countAllResults(),
            'draft_articles' => $articleModel->where('status', 'draft')->countAllResults(),
            'total_feedback' => $feedbackModel->countAll(),
            'recent_articles' => $articleModel->orderBy('created_at', 'DESC')->limit(5)->find(),
            'recent_feedback' => $feedbackModel->orderBy('created_at', 'DESC')->limit(5)->find()
        ];
        
        return view('dashboard', $data);
    }
}
