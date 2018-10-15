<?php


class Router
{
    private $routes;
    public $uri = 15;

    public function __construct()
    {
        //Подключам роуты в переменную routes
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run()
    {
        // Подключаем строку запроса

        $uri = $this->getURI();

        // Проверить наличие зароса в routes.php

        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)) {

                //Получаем внутренний путь из внешнего согласно правилу:
                $internalRoute = preg_replace("~$uriPattern~",$path, $uri );

                //Определить какой контроллер и action обраб. запрос
                $segments = explode('/', $internalRoute);

                // Вырезаем с массива наши контроллер и action
                $controllerName = array_shift($segments)."Controller";
                $controllerName = ucfirst($controllerName);

                $actionName = "action".ucfirst(array_shift($segments));


                //Если в стоке запросы были заданы параметры - то помещяем их в переменную $segments
                $parameters = $segments;

                //Подключаем файл класса контроллера
                $controllerFile = ROOT . '/controllers/'.$controllerName. '.php';


                //Создать обьект, вызвать метод т.е екшен
                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result !=null) {
                    break;
                }





            }






        }
    }

}