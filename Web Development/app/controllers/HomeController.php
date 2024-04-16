<?php

namespace App\Controllers;

require __DIR__.'/../services/articleservice.php';

use App\Models\article;

class HomeController
{
    private $articleService;

    function __construct()
    {

        $this->articleService = new \App\Services\ArticleService();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function displayHome()
    {
        session_start();
        $user_id = $_SESSION["user_id"];
        $model = $this->articleService->getAllByUser($user_id);

        require __DIR__ . '/../views/home/homepage.php';
    }
}