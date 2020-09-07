<?php

    core_secret();
    
    function page_find ($urn = '') {
        
        if ( !$urn ) $urn = web_get_urn();
        
        if (substr($urn, strlen($urn) - 1, 1) == '/') $urn = substr($urn, 0, strlen($urn) - 1);
        
        $model = model_db_get('sys_page');
        
        $page = model_db_select($model, ['where' => ["sys_page.link LIKE '".$urn."'"]], 2);
        
        if(db_rows($page) != 1){
          
          web_redirect(core_config_get('404'));
          
        }  
        
        $page = db_assoc($page);
          
        $page['modules'] = module_find( $page['sys_page_id'] );
          
        return $page;
        
    }
    
    
    
    
    
    
    