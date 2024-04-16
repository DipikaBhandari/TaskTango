<?php

namespace App\Controllers\Api;
use App\Models\article;
use DateTime;
use Exception;

class taskController
{
    private $articleService;

    function __construct()
    {
        $this->articleService = new \App\Services\ArticleService();
    }

    public function index()
    {
        echo"try";
    }
    public function getTaskToEdit()
    {
        $id = $_GET['id'] ?? '';
        if (!$id) {
            http_response_code(400);
            echo json_encode(['error' => 'Id is required']);
            return;
        }
        try {
            $tasks = $this->articleService->getTaskById($id);

            if ($tasks) {
                echo json_encode($tasks);
                return;
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Task not found']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'An error occurred while fetching task details: ' . $e->getMessage()]);
        }
    }


    /**
     * @throws Exception
     */
    public function editTask()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = json_decode(file_get_contents('php://input'), true);
            $id = !empty($data["id"]) ? htmlspecialchars($data["id"]) : '';

            $title = !empty($data["title"]) ? htmlspecialchars($data["title"]) : '';
            $content = !empty($data['content']) ? htmlspecialchars($data['content']) : '';
            $deadline = !empty($data['deadline']) ? new DateTime($data['deadline']) : null; // Convert string to DateTime object
            try {
                $task = new article();

                $task->setTitle($title);
                $task->setContent($content);
                $task->setDeadline($deadline);
                $task->setId($id);

                try {
                    if ($this->articleService->updateTask($task)) {
                        echo json_encode(['success' => true, 'message' => 'Task added successfully']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to add task']);
                    }
                } catch (Exception $e) {
                    error_log("Error during registration: " . $e->getMessage());
                    echo json_encode(['success' => false, 'message' => 'Exception occurred']);
                }
                exit;
            } catch (Exception $e) {
                error_log("Error during registration: " . $e->getMessage());
                return false;
            }
        }
    }

    public function deleteTask()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'] ?? null;

            if ($this->articleService->deleteTask($id)) {
                echo json_encode(['success' => true, 'message' => 'Task deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete task']);
            }
        } else {
            // Handle incorrect request method
            echo json_encode(['success' => false, 'message' => 'Invalid request method']);
        }
    }


    private function sendHeaders(): void
    {
        header('X-Powered-By: PHP/8.1.13');
        header("Pragma: no-cache");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header('Content-Type: application/json');
    }
}