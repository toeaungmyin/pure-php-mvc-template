<?php

class UserController extends Controller
{
    public function index()
    {
        $userModel = $this->model('User');
        $users = $userModel->getAllUsers();
        
        $data = [
            'title' => 'Users List',
            'users' => $users
        ];
        
        $this->view('user/index', $data);
    }
    
    public function profile($id = null)
    {
        if (!$id) {
            $this->redirect(BASE_URL . '/user');
            return;
        }
        
        $userModel = $this->model('User');
        $user = $userModel->getUserById($id);
        
        if (!$user) {
            $data = [
                'title' => 'User Not Found',
                'message' => 'The requested user could not be found.'
            ];
            $this->view('error/404', $data);
            return;
        }
        
        $data = [
            'title' => 'User Profile',
            'user' => $user
        ];
        
        $this->view('user/profile', $data);
    }
    
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            
            $userData = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? ''
            ];
            
            if ($userModel->createUser($userData)) {
                $this->redirect(BASE_URL . '/user');
            } else {
                $data = [
                    'title' => 'Error',
                    'message' => 'Failed to create user.'
                ];
                $this->view('error/error', $data);
            }
        } else {
            $data = [
                'title' => 'Create User'
            ];
            $this->view('user/create', $data);
        }
    }
} 