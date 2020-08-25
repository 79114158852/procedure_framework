<?php 

    core_secret();
    
    function db_mysqli_connect($options){
        
        return mysqli_connect($options['host'], $options['user'], $options['pass']);
        
        db_mysqli_query('SET NAMES UTF8');
    
    }
    
    
    function db_mysqli_query($query, $connector){
        
        return mysqli_query($connector, $query);
    
    }