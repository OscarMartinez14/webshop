<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/UserRepository.php';


class YourAccountController
{
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('index');           
        $view->title = 'Your Account';
        $view->heading = 'Your Account';
        $view->users = $userRepository->readAll();
        $view->display();
        
    }       
}

