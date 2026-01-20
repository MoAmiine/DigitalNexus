<?php

namespace App\Core;
use Error;

class Router
{

    public function dispatcher()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $new = new self();
        $response = $new->resolve($uri);
        $new->execute($response);
        }
    public function resolve($uri)
    {
        $position = strpos($uri, '?');
        if ($position == true){
        $controller = str_split($uri, $position);
        $uriArray = explode("/", $controller[0]);
        }else{
        $uriArray = explode("/", $uri);
        }
        $controller = $uriArray[1];
        $method = $uriArray[2];
        // $params = array_slice($uriArray, 2);

        $controller = ucfirst($controller) . 'Controller';
        return [
            'controller' => $controller,
            'method' => $method,
            // 'params' => $params
        ];

    }

    public function execute($response){

        $controller = "\App\Controller\\" . $response['controller'];
        $methodName = $response['method'];
        $params = isset($response['params']) ? $response['params'] : [];

        $instance = new $controller();


          return call_user_func(array($instance, $response['method']));

    
    }

}

