<?php

    core_secret();
    
    function page_find ($urn = '') {
        
        if ( !$urn ) $urn = web_get_urn();
        
        $model = model_db_get('sys_page');
        
        
        
    }