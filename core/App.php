<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        if (isset($url[0])) {
            if (file_exists('../uas/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once '../uas/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        $url = [];

        if (isset($_GET['controller'])) {
            $url[] = $_GET['controller'];
        }

        if (isset($_GET['method'])) {
            $url[] = $_GET['method'];
        }
      

        foreach ($_GET as $key => $value) {
            if ($key !== 'controller' && $key !== 'method') {
                $url[$key] = $value;
            }
        }
      
      	if (isset($_GET['id'])) {
          	$url[] = $_GET['id'];
		}

        return $url;
    }
}
