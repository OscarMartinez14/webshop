<?php

require_once '../Libraries/Repository.php';

class ProductRepository extends Repository
{
  
    protected $tableName = 'product';
    
    public function add($productName)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE productName=?";
        

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $productName);
        
        $statement->execute();
        
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        
        $row = $result->fetch_object();
        
        $result->close();
        
        return $row;
    }

    public function readByCategory_id($category_id)
    {

        $query = "SELECT * FROM {$this->tableName} WHERE category_id = ?";
        
        
        $sqlConnection = ConnectionHandler::getConnection();
        $statement = $sqlConnection->prepare($query);
        
        if (false === $statement) {
            throw new Exception($sqlConnection->error);
        }
        
        if (false === $statement->bind_param('i', $category_id)) {
            throw new Exception($statement->error);
        }
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
        
        $result = $statement->get_result();
        
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $result->close();
        return $rows;
    }
    
    
    public function create($productName, $picture1, $beschriebungSmall, $beschriebungBig, $preis, $category_id)
    {        
        $query = "INSERT INTO $this->tableName (productName, picture1, beschriebungSmall, beschriebungBig, preis, category_id) VALUES (?, ?, ?, ?, ?, ?)";
        
        $sqlConnection = ConnectionHandler::getConnection();
        $statement = $sqlConnection->prepare($query);
        
        if (false === $statement) {
            throw new Exception($sqlConnection->error);
        }
        
        $rc = $statement->bind_param('ssssii', $productName, $picture1, $beschriebungSmall, $beschriebungBig, $preis, $category_id);
        
        if(false === $rc) {
            throw new Exception($statement->error);
        }
        
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        
        return $statement->insert_id;
    }
}