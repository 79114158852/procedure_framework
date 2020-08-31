<?php

    core_secret();
    
    //echo 'ПОДКЛЮЧЕНО!!!!<hr>';
    
    function db_create_connect($options){
        
        core_require_file(__ROOT__.'/lib/system/lib.db.'.$options['type'].'.php');
        
        $func_name = 'db_'.$options['type'].'_connect';
        
        return call_user_func($func_name, $options);
    
    }
    
    function db_query($query, $connector = ''){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_query', [$query, $connector['link']]);
    
    }
  
  
    function db_assoc($res, $connector = ''){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_assoc', [$res]);
    
    }
    
    function db_array_all($res, $connector = ''){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_array_all', [$res]);
    
    }
    
    
    function db_assoc_all($res, $connector = ''){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_assoc_all', [$res]);
    
    }    
    
    
    
    function db_array($res, $connector = ''){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_array', [$res]);
    
    }
    
    function db_rows($res){
    
        global $app_db;
        
        if ( empty($connector) ) $connector = $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_rows', [$res]);
        
    }
    
    
    function db_antisql($text, $connector){
        
        global $app_db;
        
        if ( empty($connector) ) $connector = array_slice($app_db, 0, 1);
        
        return call_user_func_array('db_'.$connector['type'].'_antisql', [$text, $connector['link']]);
    
    }
    
    
    