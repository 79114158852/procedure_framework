<?php 

    core_secret();
    
    function db_mysqli_connect($options){
        
        return mysqli_connect($options['host'], $options['user'], $options['pass']);
        
        db_mysqli_query('SET NAMES UTF8');
    
    }
    
    
    function db_mysqli_query($query, $connector){
        
        return mysqli_query($connector, $query);
    
    }
    
    function db_mysqli_assoc($res){
        
        return mysqli_fetch_assoc($res);
    
    }    
    
    
    function db_mysqli_array($res){
        
        return mysqli_fetch_array($res);
    
    }    
    
    
    function db_mysqli_antisql($text, $connector){
        
        return mysqli_real_escape_string($connector, $text);
    
    }    