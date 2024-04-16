<?php
namespace App\Controllers;
require_once __DIR__ . '/../services/articleservice.php';

class ArticleController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new \App\Services\ArticleService();
    }

    public function index()
    { session_start();
        $user_id = $_SESSION["user_id"];
        $model = $this->articleService->getAllByUser($user_id);

        require __DIR__ . '/../views/article/index.php';
    }

    public function create() {

        session_start();
        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['content'];
            $deadline = $_POST['deadline'];
            $category = $_POST['category'];
            $user_id = $_SESSION['user_id'];

            $article = array(
                'title' => $title,
                'content' => $content,
                'deadline' => $deadline,
                'category' => $category,
                'user_id' => $user_id
            );
            $task= $this->articleService->insert($article);
            if ($task) {
                // Redirect to the index page
                header("Location: /home/displayHome");
                exit();
            }
        }
        require __DIR__ . '/../views/article/create.php';
    }

    public function updateTask()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_SESSION['id'];

            $data = json_decode(file_get_contents('php://input'), true);

            // Fetch the task by ID
            $task = $this->articleService->getTaskById($id);

            if ($task) {
                // Extract the task details
                $title = $data['title'] ?? '';
                $content = $data['content'] ?? '';

                // Update the task
                $updateSuccess = $this->articleService->updateTask($data['id'], $title, $content);

                if ($updateSuccess) {
                    header("Location: /");
                    echo json_encode(['success' => true, 'message' => 'Task updated successfully.']);
                    exit();
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to update task.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Task not found.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method or not logged in.']);
        }

    }


}