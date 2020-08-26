<?php
    
    
    #
    
    function message_add ($msg, $type = 'msg') {
    
        switch($type){
            
            case "fatal":
            
                die($msg);
            
            default:
                
                $_SESSION['messages'][] = [$type, $msg, time()];
            
                break;  
        
        }
        
    }
    
    
    
    
    function message_get($type = '') {
        
        $messages = [];
        
        for ( $i = 0; $i < count($_SESSION['messages']); $i++ ) {
        
            if ( $type != '' && $_SESSION['messages'][$i][0] != $type ) continue;
                
            $messages[] = $_SESSION['messages'][$i];
            
            unset($_SESSION['messages'][$i]);
            
        }
        
        return $messages;
        
    }
    
    