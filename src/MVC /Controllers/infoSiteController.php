<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/UserRepository.php';

class infoSiteController
{
    public function index()
    {
        $view = new View('index');
        $view->title = 'Info';
        $view->display();
    }
}