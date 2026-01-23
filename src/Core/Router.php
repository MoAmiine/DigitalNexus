<?php

namespace App\Core;

use Error;

class Router
{

    public function dispatcher()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $response = $this->resolve($uri);
        $this->execute($response);
    }
    public function resolve($uri)
    {
        $position = strpos($uri, '?');
        if ($position == true) {
            $controller = str_split($uri, $position);
            $uriArray = explode("/", $controller[0]);
        } else {
            $uriArray = explode("/", $uri);
        }
        if (empty($uriArray[1])) {
            return [
                'controller' => 'HomeController',
                'method' => 'Catalogue'
            ];
        }
        $controller = $uriArray[1];
        $method = isset($uriArray[2]) ? $uriArray[2] : 'index';

        $controller = ucfirst($controller) . 'Controller';


        return [
            'controller' => $controller,
            'method' => $method,
        ];
    }

    public function execute($response)
    {

        $controller = "\App\Controller\\" . $response['controller'];
        $methodName = $response['method'];

        $instance = new $controller();


        return call_user_func(array($instance, $response['method']));
    }
}
