<?php
    
    function message_add($msg, $type = 'msg'){
    
        switch($type){
            
            case "fatal":
            
                die($msg);
            
            default:
                
                $_SESSION['messages'][] = [$type, $msg];
            
                break;  
        
        }
        
    }
    