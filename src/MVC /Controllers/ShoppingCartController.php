<?php
require_once '../Libraries/View.php';
require_once '../MVC/Models/ProductRepository.php';
require_once '../MVC/Models/ShoppingCartRepository.php';
require_once '../MVC/Models/UserRepository.php';

class ShoppingCartController
{
    public function index()
    {
        $shoppingCartRepository = new ShoppingCartRepository();

        $view = new View('index');
        $view->title = 'ShoppingCart';
        $view->heading = 'ShoppingCart';
        $this->refreshProductAmountInfoInSession();
         
        $view->shoppingCartRepository = $shoppingCartRepository;
        $view->products = $shoppingCartRepository->readAllByUserId($_SESSION["UserID"]);
        
        $view->display();        
    }
    public function refreshProductAmountInfoInSession(){
        
        if (!isset($_SESSION["loggedInUserId"])){
            $_SESSION["HasItemInShopingCart"] = false;
            return;
        }
        
        $shoppingCartRepository = new ShoppingCartRepository();
        $_SESSION["HasItemInShopingCart"] = $shoppingCartRepository->hasItemInShoppingCart($_SESSION["UserID"]);
        
    }
    public function add()
    {
        $productId = $_GET["productId"];
        $userId = $_SESSION["UserID"];
        $view = new View('index');
       
        $shoppingCartRepository = new ShoppingCartRepository();
        $shoppingCartRepository->addToShoppingCart($productId, $userId);
        $view->users = $shoppingCartRepository->readAll();
        
        $this->refreshProductAmountInfoInSession();
        header("location: /CategoriePages/?categorieId=1");
        
        die();
    }
    
    public function deleteProduct()
    {
        $productId = $_GET['productId'];
        
        $shoppingCartRepository = new ShoppingCartRepository();
        $shoppingCartRepository->delete($productId, $_SESSION["UserID"]);
        
        $this->refreshProductAmountInfoInSession();
        
        header('Location: /shoppingCart/index');
    }
    
    
    

}

