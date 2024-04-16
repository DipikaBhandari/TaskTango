<?php
namespace App\Services;
require_once __DIR__ . '/../repositories/articlerepository.php';

use App\Models\article;

class ArticleService {
    public function getAll() {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->getAll();
    }

    public function getAllByUser($user_id) {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->getAllByUser($user_id);
    }

    public function insert($article):bool {
        $repository = new \App\Repositories\ArticleRepository();
      return $repository->createTask($article);
    }

    public function getTaskById($id) {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->getTaskById($id);
    }



    public function updateTask(article $task) {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->updateTask($task);
    }

    public function deleteTask($id) {
        $repository = new \App\Repositories\ArticleRepository();
        return $repository->deleteTask($id);
    }
}