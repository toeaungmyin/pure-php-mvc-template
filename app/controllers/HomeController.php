<?php

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to PHP MVC',
            'message' => 'This is the home page of your MVC application!'
        ];
        
        $this->view('home/index', $data);
    }
    
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'message' => 'This is the about page.'
        ];
        
        $this->view('home/about', $data);
    }
} 