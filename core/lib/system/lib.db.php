<?php

    core_secret();
    
    //echo 'ПОДКЛЮЧЕНО!!!!<hr>';
    
    function db_create_connect($options){
        
        if( !core_require_file(__ROOT__.'/lib/system/lib.db.'.$options['type'].'.php') ) message_add('Библиоетка баз данных '.$options['type'].' не найдена!', 'fatal');
        
        $func_name = 'db_'.$options['type'].'_connect';
        
        return call_user_func($func_name, $options);
    
    }
    
    
    
   function db_query($query, $connector = ''){
        
        global $app_db;
        
        $connector ?? $app_db[0];
        
        return call_user_func_array('db_'.$connector['type'].'_query', [$query, $connector['link']]);
    
    }