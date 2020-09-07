<?php

    core_secret();
    
    
    
    $mode = 'list';
    
    if (isset ($_GET['id']) ) $mode = 'edit';
    
    $options = util_json_encode($mod['sys_module_options']);
    
    $model = model_db_get($options['model']);
    
    switch ( $mode ) {
    
        case "edit":
          
          $data = model_db_select($model, ['where' => [$options['model'].'.id='.$_GET['id']]], 2);
          
          $data = db_assoc($data);
          
          //util_array($data);
          
          $model = util_json_encode($model);  
          
          $fields = $model['fields'];
            
          $template = 'edit.tpl';
                 
          break;
                    
        default:
            
          $data = model_db_select($model, [], 1);
          
          $data = db_assoc_all($data);
          
          $thead = model_get_header($model, 1);
          
          $template = 'list.tpl';
            
          break;  
    
    }
    
    require 'tpl/'.$template;
    
    
    