<?php
namespace App;

use Error;

class patternrouter
{
    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        $uri = $this->stripParameters($uri);
        $explodedUri = explode('/', $uri);

        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = 'home';
        }

        if ($explodedUri[0] == 'api') {
            $controllerName = "App\\Controllers\\Api\\" . ucwords($explodedUri[1]) . "Controller";
            $methodName = $explodedUri[2] ?? 'index';
        } else {
            $controllerName = "App\\Controllers\\" . ucwords($explodedUri[0]) . "Controller";
            $methodName = isset($explodedUri[1]) ? $explodedUri[1] : 'index';
        }

        if(!class_exists($controllerName) || !method_exists($controllerName, $methodName)) {
            http_response_code(404);
            return;
        }

        try {
            $controllerObj = new $controllerName();
            $controllerObj->$methodName();

        } catch(Error $e) {
            // For some reason the class/method doesn't work
            http_response_code(500);
        }
    }
}