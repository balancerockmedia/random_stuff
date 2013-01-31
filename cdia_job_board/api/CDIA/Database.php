<?php

namespace CDIA;

use \PDO as PDO;

/**
 * A PDO Database Helper Class
 *
 * @author dan@balancerockmedia.com
 */
class Database {
    
    protected $pdo;
    
    /**
     * Construct
     */
    public function __construct() {
        try {
            $host = HOST;
            $port = PORT;
            $database = DATABASE;
            $this->pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", USERNAME, PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
    
    /**
     *
     * @param string $query
     * @return PDOStatement
     */
    public function fetchAll($query, $params) {
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     *
     * @param string $table 
     * @param array $params 
     * @return int|boolean insert_id or FALSE
     */
    public function insert($table, $params) {
        if (!ctype_alnum($table)) {
            return FALSE;
        }
        
        $columns = '';
        foreach ($params as $key => $value) {
            $columns .= $key . ',';
        }
        $columns = rtrim($columns, ',');
        
        $placeholders = '';
        foreach ($params as $key => $value) {
            $placeholders .= ":$key,";
        }
        $placeholders = rtrim($placeholders, ',');
        
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        
        if ($stmt->execute($params)) {
            return $this->pdo->lastInsertId();
        } else {
            return FALSE;
        }
    }
    
    /**
     *
     * @param string $table 
     * @param string $id 
     * @param array $params 
     * @return boolean
     */
    public function update($table, $id, $params) {
        if (!ctype_alnum($table)) {
            return FALSE;
        }
        
        $pairs = '';
        foreach ($params as $key => $value) {
            $pairs .= "$key=:$key,";
        }
        $pairs = rtrim($pairs, ',');
        
        $stmt = $this->pdo->prepare("UPDATE $table SET $pairs WHERE id = :id");
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        
        return $stmt->execute();
    }
    
    /**
     *
     * @param string $table
     * @param string $id
     * @return boolean
     */
    public function delete($table, $id) {
        if (!ctype_alnum($table)) {
            return FALSE;
        }
        
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    /**
     * Destruct
     */
    public function __destruct() {
        $this->pdo = null;
    }
    
}

?>