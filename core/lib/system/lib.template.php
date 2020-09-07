<?php

    core_secret();
    
    function template_load($template, $page){
        
       require __ROOT__.'/../views/'.$template;
       
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
          
          if ( !$modules ) return false;
          
          foreach ( $modules as $module ) {
              
              if ( $module['sys_page_module_position'] == $position) {
                    
                    //echo '<h1>'.$position.'</h1>';
                    
                    module_load( $module['sys_page_module_module_id'] );
                    
              }      
          
          }
    
    }