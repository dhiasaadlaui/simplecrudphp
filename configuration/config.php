<?php 
class Config { 
private static $instance = NULL; 
public static function getConnexion() { 
     if (!isset(self::$instance)) { 
            self::$instance = new PDO('mysql:host=localhost;dbname=clubdb',     'root', ''); 
      } 
            return self::$instance; 
    } 
  } 
?>