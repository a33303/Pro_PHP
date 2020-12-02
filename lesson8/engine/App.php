<?php

namespace App\engine;

use App\services\Request;

class App
{
    protected $container;
    protected $config;

    public function run(Request $request, $config)
    {
        $this->config = $config;

        $this->initContainer($config['components']);

        $controller = 'user';
        if (!empty($request->get('c'))) {
            $controller = trim($request->get('c'));
        }

        $action = '';
        if (!empty($request->get('a'))) {
            $action = trim($request->get('a'));
        }

        $controllerName = 'App\\controllers\\' . ucfirst($controller) . 'Controller';
        if (!class_exists($controllerName)) {
            return '404_c';
        }

        $render = new \App\services\renders\TmplRenderer();

        /** @var \App\controllers\Controller $controllerObject */
        $controllerObject = new $controllerName($render, $request, $this->container);
        return $controllerObject->run($action);
    }

    protected function initContainer($componentsConfig)
    {
        $this->container = new Container($componentsConfig);
    }

}