<?php

class Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function view($view, $data = [])
    {
        require_once "../uas/views/" . $view . ".php";
    }
    public function model($model)
    {
        require_once '../uas/Models/' . $model . '.php';
        return new $model($this->db);
    }

}






// class Controller {

// public function view($view, $data = [])
// {
//     require_once '../app/views/' . $view . '.php';
// }

// public function model($model)
// {
//     require_once '../app/models/' . $model . '.php';
//     return new $model;
// }

// }

