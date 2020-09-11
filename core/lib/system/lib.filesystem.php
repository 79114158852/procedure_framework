<?php

    core_secret();
    
    function filesystem_list($path, $dirs = true, $files = true) {
    
        $items = array_diff( scandir($path), array('..', '.'));
        
        $result = [];
        
        foreach ($items as $item) {
            
            if ($files && is_file($path.'/'.$item)) $result['files'][] = $item;
            
            if ($dirs && is_dir($path.'/'.$item)) $result['dirs'][] = $item;
          
        }
        
        return $result;
    
    }
    