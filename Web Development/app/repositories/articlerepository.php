<?php
namespace App\Repositories;
include_once __DIR__ . '/Repository.php';
require_once __DIR__ . '/../Models/article.php';

use App\Models\article;
use PDO;
use PDOException;

class ArticleRepository extends Repository {

    function get() {
        $category = "home";
        $stmt = $this->connection->prepare("SELECT * FROM task WHERE category = :category");
        $stmt->bindParam(':category', $category); // Binding the variable

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }

    function getAll() {

        $stmt = $this->connection->prepare("SELECT * FROM task");

        $stmt->execute();

        $model= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $model;

    }

    function getAllByUser($user_id) {

        $stmt = $this->connection->prepare("SELECT * FROM task WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id); // Binding the variable

        $stmt->execute();

        $model= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $model;

    }

    public function getTaskById($id)
    {
        try {
            $sql = "SELECT * FROM task WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            // Handle the error properly
            error_log($e->getMessage());
            return null;
        }
    }
    public function createTask($article): bool
    {
        $stmt = $this->connection->prepare("INSERT INTO task (title, content, created_at, deadline, category, user_id) 
        VALUES (:title, :content, now(), :deadline, :category, :user_id)");

        $stmt->bindValue(':title', $article["title"]);
        $stmt->bindValue(':content', $article["content"]);
        $stmt->bindValue(':deadline', $article["deadline"]);
        $stmt->bindValue(':category', $article["category"]);
        $stmt->bindValue(':user_id', $article["user_id"]);

        $stmt->execute();

        return true;
    }

//    public function getTaskById($id): mixed
//    {
//        try {
//            $stmt = $this->connection->prepare("SELECT * FROM task WHERE id = :id;");
//            $stmt->bindParam(':id', $id);
//            $stmt->execute();
//
//            // Fetch the task
//            $task = $stmt->fetch(PDO::FETCH_ASSOC);
//
//            // Return the task if found
//            return $task;
//        } catch (PDOException $e) {
//            // Handle any database errors here
//            // For example, you might log the error or return null
//            echo "Error: " . $e->getMessage();
//            return null;
//        }
//    }

    public function updateTask(article $task): bool
    {
        try {
            $stmt = $this->connection->prepare("UPDATE task SET title = :title, content = :content, deadline = :deadline WHERE id = :id");

            $stmt->bindValue(':title', $task->getTitle());
            $stmt->bindValue(':content', $task->getContent());
            $stmt->bindValue(':deadline', $task->getDeadline()->format('Y-m-d H:i:s')); // Format deadline as string

            $stmt->bindValue(':id', $task->getId(), PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle exception
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }


    public function deleteTask($identifier)
    {
        try {
            $sql = "DELETE FROM task WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $identifier);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }
    }
}