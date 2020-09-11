<?php

    core_secret();
    
    
    $mode = 'list';
    
    
    switch ($mode) {
    
        case "edit":
        
        
            break;
            
        default:
            
            $k = 1;
            
            $res = filesystem_list(__ROOT__.'/../'.core_config_get('dbmodels'));
            
            foreach($res['dirs'] as $dir) {
                
                $files = filesystem_list(__ROOT__.'/../'.core_config_get('dbmodels').'/'.$dir, false);
                
                $files = $files['files'];
                
                $models[$dir][] = $files['files'];
            
            }
                       
            $template = 'list.tpl';
            
            break;  
    }
    
    util_array($models);
    
    require 'tpl/'.$template;
    
    
    
    
    
    
    