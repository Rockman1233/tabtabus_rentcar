<?php

/*
Класс-маршрутизатор для определения запрашиваемой страницы.
> цепляет классы контроллеров и моделей;
> создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
*/
class Route
{
	private $aRouts = [

	];

	public function __construct()
	{
		
		$routes = $_SERVER['DOCUMENT_ROOT'].'/config/routes.php';
		$this->aRouts = include($routes);

	}

    private function getURL()
    {
        //получаем строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');

        }
        return null;
    }


	public function start() {

        $uri = $this->getURL();
        echo $uri;

        foreach ($this->aRouts as $uriPattern => $path) {
            if (preg_match("~$uriPattern~",$uri)) {


                //black magic (change reg exp)
                $internalRoute = preg_replace("~$uriPattern~","$path","$uri");


                $segments = explode('/',$internalRoute);

                $controllerName = array_shift($segments).'Controller';

                //take name of file with class

                $controllerName = ucfirst($controllerName);

                //take name of method

                $actionName = 'action'.ucfirst(array_shift($segments));
                $parametrs = $segments;
                echo '<br>'.$controllerName;

                //connect files
                $controllerFile = $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile))
                {
                    include_once $controllerFile;
                }
                echo '<br>'.$controllerFile;
                //create new object
                $classObject = new $controllerName();
                $result = call_user_func_array(array($classObject, $actionName), $parametrs);

                if($result != NULL){
                    break;
                }

            }
        }
    }
    
}
