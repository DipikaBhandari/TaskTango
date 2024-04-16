<?php

namespace App\controllers;

use App\Services\userService;

require_once __DIR__ . '/../config/dbconfig.php';

require_once __DIR__ . '/../services/UserService.php';

class UserController
{

    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $pageTitle = "Login";
        require '../views/loginUser/login.php';
    }

    public function login()
    {
        session_start();
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $loggedUser = $this->userService->authenticateUser($username, $password);

            if ($loggedUser) {
                $_SESSION['user_id'] = $loggedUser->getUserId();
                $_SESSION['loggedIn'] = true; // Set the loggedIn session variable to true
                header("Location: /home");
                exit();
            }
            else{
                header("Location: /home");
                exit();
            }

        }
        require_once __DIR__ . '/../views/loginUser/login.php';
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            // Unset session variables
            session_unset();
            // Destroy the session
            session_destroy();
            // Redirect to home page
            header("Location: /");
            exit();
        }
    }
}