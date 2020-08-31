<?php

    core_secret();
    
    function template_load($template, $page){
        
       core_require_file(__ROOT__.'/../views/'.$template, 'require', false, $page);
       
    }
    
    
    function template_add_css($page){
        
        if ( !$page['sys_page_css'] ) return false;
        
        $arr_css = explode(',', $page['sys_page_css']);
        
        foreach ($arr_css as $css ) {
        
            echo '<link rel="stylesheet" type="text/css" href="'.$css.'?v='.time().'"/>';
          
        }
    
    }
    
    
    
    function template_add_js($page){
        
        if ( !$page['sys_page_js'] ) return false;
        
        $arr_js = explode(',', $page['sys_page_js']);
        
        foreach ($arr_js as $js ) {
        
            echo '<script src="/assets/js/'.$js.'"></script>';
          
        }
    
    }
    
    
    function template_position($position, $modules){
    
        
    
    }