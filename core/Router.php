<?php

namespace core;

class Router
{
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function run()
    {
        $parts = explode('/', $this->route);
        if (strlen($parts[0]) == 0) {
            $parts[0] = 'site';
            $parts[1] = 'index';
        }
        if (count($parts) == 1)
            $parts[1] = 'index';
        Core::get()->moduleName = $parts[0];
        Core::get()->actionName = $parts[1];

        $controller = 'controllers\\' . ucfirst($parts[0]) . 'Controller';
        $method = 'action' . ucfirst($parts[1]);
        if (class_exists($controller)) {
            $controllerObject = new $controller();
            Core::get()->controllerObject = $controllerObject;
            if (method_exists($controller, $method)) {
                array_splice($parts, 0, 2);
                return $controllerObject->$method($parts);
            } else $this->error(404);
        } else
            $this->error(404);
    }

    public function done()
    {

    }

    public function error($code)
    {
        http_response_code($code);
        Core::get()->controllerObject->redirect('/errors/404');
        echo $code;
    }
}