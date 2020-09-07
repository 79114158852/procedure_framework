<?php

    core_secret();
    
    function module_find($page_id, $position = ''){
    
        $model = model_db_get('sys_page_module');
        
        $options['where'][] = 'sys_page_module.page_id = '.$page_id;
        
        if ( $position ) $options['where'][] = "AND sys_page_module.position = '".db_antisql($position)."'";
        
        $options['order'] = ['sys_page_module.position ASC', 'sys_page_module.ordering ASC'];
        
        $modules = model_db_select($model, $options, 2);
        
        return db_rows($modules) > 0 ? db_assoc_all($modules) : [];
        
    }
    
    
    function module_load( $id ) {
        
        $model = model_db_get('sys_module');
        
        $options['where'][] = 'sys_module.id = '.$id;
        
        $module = model_db_select($model, $options, 2);
        
        if ( db_rows($module) != 1 ) message_add('Модуль не найден! ('.$id.')', 'fatal');
        
        $mod = db_assoc($module);
        
        require __ROOT__.'/../mods/mod_'.$mod['sys_module_module'].'/mod_'.$mod['sys_module_module'].'.php';
    
    }
    