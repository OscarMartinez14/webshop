<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/ProductRepository.php';
require_once '../MVC/Models/CategoryRepository.php';

class CategoriePagesController
{

    public function index()
    {
        $view = new View('index');
        $categoryRepository = new CategoryRepository();
        $catObj = $categoryRepository->readById($_GET["categorieId"]);
        $view->meinFancyTitle = $catObj->category;
        $productRepository = new ProductRepository();
        $view->products = $productRepository->readByCategory_id($_GET["categorieId"]);

        $view->title = 'Categories';
        $view->heading = 'Categories';
        $view->display();
    }
}