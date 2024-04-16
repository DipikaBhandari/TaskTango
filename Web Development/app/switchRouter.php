<?php
namespace App;

use App\api\articlecontroller;
use App\Controllers\HomeController;
use App\Controllers\UserController;
require_once __DIR__ . '/controllers/usercontroller.php';
require_once __DIR__ . '/controllers/homecontroller.php';
class switchRouter
{
    public function route($uri)
    {
        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case '':
            case 'home':
            $controller = new HomeController();
            $controller->index();
            break;
            case 'home/loginAction':
                $controller = new UserController();
                $controller->index();
                break;
            case 'home/homepage':
                $controller = new HomeController();
                $controller->about();
                break;
            case 'home/manage':
                $controller = new articlecontroller();
                $controller->about();
                break;
            default:
                http_response_code(404);
                break;
        }

    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}