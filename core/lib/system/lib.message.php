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
        
        if ( !isset ( $_SESSION['messages'] ) ) return [];
        
        $messages = [];
        
        $k = -1;
        
        foreach ( $_SESSION['messages'] as $message) {
            
            $k++;
        
            if ( ( $type != '' && $message[0] != $type ) ) continue;
                
            $messages[] = $message;
            
            unset($_SESSION['messages'][$k]);
            
        }
        
        return $messages;
        
    }
    
    
    function message_show($type = ''){
    
          $messages = message_get($type);
          
          foreach ( $messages as $message ) {
          
              echo '<div class="message '.$message[0].'"><span class="time">'.date('H:i:s', $message[2]).'</span>'.$message[1].'</div>';
          
          }
        
    }
    
    