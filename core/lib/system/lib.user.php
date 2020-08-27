<?php

    core_secret();
    
    function user_init ( $id = 0 ) {
        
        if(!$id) 
        
        $user = ['sys_user_id' => 0, 'sys_user_name' => 'Гость', 'sys_user_access' => 0];
        
        if( !$id && isset( $_SESSION['user_id'] ) )  $id = $_SESSION['user_id'];
        
        $user_temp =  user_find ( $id );
        
        if ($user_temp) $user = array_merge($user, $user_temp);
        
        return $user;
        
    }
    
    
    
    function user_find ( $id = 0 ) {
    
        $user = model_db_select(model_db_get('sys_user'), ['where' => ["sys_user.id = ".$id]], 2);
        
        return db_assoc($user);
        
    }
    
    
    