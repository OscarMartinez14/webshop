<?php
require_once '../Libraries/Repository.php';

class ShoppingCartRepository extends Repository
{
  
    protected $tableName = 'shoppingCart';
    
    public function addToShoppingCart($productId, $userId)
    {
        $query = "INSERT INTO $this->tableName (product_id, customer_id) VALUES (?, ?)";
 
        $connection =  ConnectionHandler::getConnection();
        
        $statement = $connection->prepare($query);
        $statement->bind_param('ii', $productId, $userId);
        
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    
    public function readAllByUserId($userId){
        
        $query = "SELECT product.*, shoppingcart.customer_id FROM shoppingcart INNER JOIN product ON shoppingcart.product_id=product.id WHERE shoppingcart.customer_id = ?;";
        
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userId);
        $statement->execute();
        
        $result = $statement->get_result();
        if (! $result) {
            throw new Exception($statement->error);
        }
   
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        
        return $rows;
    }
    
    public function groupByProduct_id($productId)
    {
        $query = "SELECT count(*) as Qty FROM {$this->tableName} WHERE product_id = ? group by product_id;";
             
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $productId);
        
        $statement->execute();
        
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        
        $row = $result->fetch_object();
        
        $result->close();
        
        return $row->Qty;
        
    }
    public function hasItemInShoppingCart($userId)
    {
        $query = "SELECT * FROM $this->tableName WHERE customer_id = ?  ";
        
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userId);
        $statement->execute();
        
        $result = $statement->get_result();
        
        return $result->num_rows > 0;
    }
    public function delete($productId, $userId)
    {
        $query = "DELETE FROM {$this->tableName} WHERE product_id=? and customer_id =?";
        
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $productId, $userId);
        
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    
    
   

}