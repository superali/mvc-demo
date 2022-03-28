<?php

namespace App\Models;

use PDO;

/**
 * Post Model
 * 
 * PHP version 8.0
 * 
 */

 class Post extends \Core\Model{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
  
        try {
            $db = self::getDBConnection();

            // $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return $results;
            return $db;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 }

 