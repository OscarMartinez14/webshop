<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/ProductRepository.php';

class SellController
{
    public function index()
    {
        $view = new View('index');
        $view->title = 'Sell';
        $view->display();
    }
    
    public function doCreate()
    {
        $productName = $_POST['productName'];
        $beschriebungSmall = $_POST['beschriebungSmall'];
        $beschriebungBig = $_POST['beschriebungBig'];
        $preis = $_POST['preis'];
        $category_id = $_POST['category_id'];
        
        $uploaddir = 'CardImages/';
        $uploadfile = $uploaddir . basename($_FILES['picture1']['name']);
        move_uploaded_file($_FILES['picture1']['tmp_name'], $uploadfile);
        
        $productRepository = new ProductRepository();
        $productRepository->create($productName, $uploadfile, $beschriebungSmall, $beschriebungBig, $preis, $category_id);
        
        header('Location: /');
        die();
    }
}