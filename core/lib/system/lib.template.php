<?php

    core_secret();
    
    function template_get($filename){
        
        return core_require_file(__ROOT__.'/../views/'.$filename, 'get');
        
    }
    
    
    function template_render($template, $data){
                        
        preg_match_all('/\{.*?\}/ui', $template, $matches, PREG_SET_ORDER, 0);
        
        foreach ($matches as $match) {  
            
            $replace = '';
            
            $temp_match = explode(' ', str_replace(['{','}'], '', $match[0]));
            
            switch ( $temp_match[0] ){
            
                
                
                default: 
                    
                    if(strpos($temp_match[0], '[') === false)  {
                    
                        
                        
                    } else {
                        
                        //util_array($data);
                    
                        echo $temp_match[0];
                    
                        $replace = ${"data['sys_page_title']"};
                        
                        
                    
                    } 
                    
                    break;
            
            
            }
            
            str_replace($match, $replace, $template);
        
        }
        
        
        echo $template;
        
       // util_array($matches);
        
        
    }