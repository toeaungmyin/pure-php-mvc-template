<?php

class Controller
{
    public function model($model)
    {
        require_once MODELS . '/' . $model . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        // Extract data array to variables
        extract($data);
        
        // Include the view file
        require_once VIEWS . '/' . $view . '.php';
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }

    public function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
} 