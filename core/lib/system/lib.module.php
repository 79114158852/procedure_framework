<?php

    core_secret();
    
    function module_find($page_id, $position = ''){
    
        $model = model_db_get('sys_page_module');
        
        $options['where'][] = 'sys_page_module.page_id = '.$page_id;
        
        if ( $position ) $options['where'][] = "AND sys_page_module.position = '".db_antisql($page_id)."'";
        
        $options = ['order' => ['sys_page_module.position ASC', 'sys_page_module.ordering ASC']];
        
        $modules = model_db_select($model, $options, 2);
        
        return db_rows($modules) > 0 ? db_assoc_all($modules) : [];
        
    }