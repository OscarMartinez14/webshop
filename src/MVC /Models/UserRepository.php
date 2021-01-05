<?php

require_once '../Libraries/Repository.php';


class UserRepository extends Repository
{

    protected $tableName = 'customer';
       
    public function readByUsernameEmailPassword($userName, $email, $password)
    {
        $password = sha1($password);
       
        $query = "SELECT * FROM {$this->tableName} WHERE userName = ? AND email = ? AND password = ?";
        
             
        $sqlConnection = ConnectionHandler::getConnection();
        $statement = $sqlConnection->prepare($query);
        
        if (false === $statement) {
            throw new Exception($sqlConnection->error);
        }
        
        if (false === $statement->bind_param('sss', $userName, $email, $password)) {
            throw new Exception($statement->error);
        }
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
        
        $result = $statement->get_result();
        
        if (! $result) {
            throw new Exception($statement->error);
        }
        
        
  
        $row = $result->fetch_object();
        
      
        $result->close();
        
       
        return $row;
    }


    public function create($firstName, $lastName, $userName, $email, $password, $date, $kanton, $ort, $plz, $uploadfile)
    {
        $password = sha1($password);

        $query = "INSERT INTO $this->tableName (firstName, lastName, userName, email, password, date, kanton, ort, plz, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$sqlConnection = ConnectionHandler::getConnection();
        $statement = $sqlConnection->prepare($query);
		
		if (false === $statement) {  
          throw new Exception($sqlConnection->error);
		}
			
		$rc = $statement->bind_param('sssssissis', $firstName, $lastName, $userName, $email, $password, $date, $kanton, $ort, $plz, $uploadfile);		
		
		if(false === $rc) {
			throw new Exception($statement->error);
		}

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }    
    public function changeUsername($new_username, $id)
    {
        $query = "UPDATE $this->tableName SET userName = ? WHERE id = ?";
        
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        
        $rc = $statement->bind_param('si', $new_username, $id);
        
        if (false === $rc) {
            throw new Exception($statement->error);
        }
    }
        public function changePassword($new_password, $id)
        {
            $query = "UPDATE $this->tableName SET password = ? WHERE id = ?";
            
            $connection = ConnectionHandler::getConnection();
            $statement = $connection->prepare($query);
            
            if (false === $statement) {
                throw new Exception($connection->error);
            }
            $new_password = sha1($new_password);
            $rc = $statement->bind_param('si', $new_password, $id);
            
            /*
             * bind_param() can fail because the number of parameter doesn't match the placeholders
             * in the statement or there's a type conflict
             */
            if (false === $rc) {
                throw new Exception($statement->error);
            }
        
        $statement->execute();
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    
    public function changeEmail($new_email, $id)
    {
        $query = "UPDATE $this->tableName SET email = ? WHERE id = ?";
        
        $connection = ConnectionHandler::getConnection();
        $statement = $connection->prepare($query);
        
        if (false === $statement) {
            throw new Exception($connection->error);
        }
        
        $rc = $statement->bind_param('si', $new_email, $id);
        
        /*
         * bind_param() can fail because the number of parameter doesn't match the placeholders
         * in the statement or there's a type conflict
         */
        if (false === $rc) {
            throw new Exception($statement->error);
        }
        
        $statement->execute();
        
        if (! $statement->execute()) {
            throw new Exception($statement->error);
        }
    }
    
}