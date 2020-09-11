<?php

    core_secret();
    
    $mode = 'list';
    
    if (isset ($_GET['id']) ) $mode = 'edit';
    
    $options = util_json_encode($mod['sys_module_options']);
    
    $model = model_db_get($options['model']);
    
    
    if(isset($_POST['id'])) require 'helper.php';
    
    switch ( $mode ) {
    
        case "edit":
          
          if ($_GET['id'] > 0) {
          
              $data = model_db_select($model, ['where' => [$options['model'].'.id='.$_GET['id']]], 2);
              
              $data = db_assoc($data);
          
          }
          
          $model = util_json_encode($model);  
          
          $fields = $model['fields'];
            
          $template = 'edit.tpl';
                 
          break;
                    
        default:
          
          $jmodel = util_json_encode($model);
          
          $opts = ['where'=>[], 'order'=>[]];
          
          $thead = model_get_header($model, 1);
          
          foreach ( $thead as $field_name => $field_options) {
              
              if ( $field_options['filter'] == '1' && isset($_GET[$field_name]) && !empty($_GET[$field_name]) ){
                  
                  $opts['where'][] = "`".$jmodel['table']."`.".$field_name." = '".$_GET[$field_name]."'";
                  
              }     
          
          }
            
          $data = model_db_select($model, $opts, 1);
          
          $data = db_assoc_all($data);
          
          $template = 'list.tpl';
            
          break;  
    
    }
    
    require 'tpl/'.$template;
    
    
    