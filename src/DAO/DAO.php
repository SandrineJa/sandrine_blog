<?php
namespace App\src\DAO;

use PDO;
use Exception;


abstract class DAO {
    
    //variable containing the database connection
    private $connection;
    
    private function checkConnection() {
        //if $connection is null, calls the getConnection() function which creates a connection and stocks it in $connection
        if($this->connection === null) {
            return $this->getConnection();
        }
        //if the connection exists, returns it
        return $this->connection;
    }
    
    
    //connection to the database
    private function getConnection() {
        try{
            $this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //returns an error if the connection fails
        catch(Exception $errorConnection) {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }

    //executes an sql query and returns the result, if the query has parameters the function tests the query first to avoid sql injections
    //setFetchMode allows us to get the result as an object of a certain class, here it's static::class which is the class that called the function
    protected function createQuery($sql, $parameters = null) {
        if($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            // $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        // $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}

