<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/application/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();

        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //echo "<br>$uriPatterns -> $path";

            //Сравниваем $uriPattern and $uri;
            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Определить какой контроллер и экшн

                $segments = explode('/',$internalRoute);

                $controllerName = array_shift($segments) . 'Controller';

                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                //Подключить файл класс-контроллера
                $controllerFile = ROOT . '/application/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                // создать объект и вызвать метод
                $controllerObject = new $controllerName;
                $result = call_user_func_array([$controllerObject,$actionName], $parametrs);

                if ($result != NULL) {
                    break;
                }
            }
        }


    }
}
