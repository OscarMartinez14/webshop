<?php
require_once '../MVC/Models/ProductRepository.php';

class DefaultController
{
    public function index()
    {
        $productRepository = new ProductRepository();
        $view = new View('index');
        $view->products = $productRepository->readAll();
        $view->title = 'Buy & Sell';
        $view->display();
    }
}
