<?php

    core_secret();
    
    function model_db_get ( $path , $name = 'general') {
        
        $path .= '/'.$name.'.php';
        
        $model = file_get_contents (__ROOT__.'/../model/db/'.$path);
        
        return $model;
        
    }
    
    
    function model_db_defoptions(){
        
        return ['teg' => '', 'type' => 'int', 'sort' => '0', 'filter' => '0', 'view' => '3', 'source' => '', 'link' => ''];
    
    }
    
    function model_db_select($model, $options = [], $mode = 1){
          
         $model = util_json_encode($model);
         
         $q = "SELECT ";
         
         $fields = [];
         
         $relations = [];
         
         foreach ( $model['fields'] as $field => $opts ) {
            
            $opts = array_merge(model_db_defoptions(), $opts);
            
            if ( in_array( $opts['view'], [3, $mode]) ) {
            
                  //util_array($opts);
            
                  if ( $opts['link'] && $mode != 2) $relations[] = " LEFT JOIN ".preg_replace('/\..*/u', '',  $opts['link'])." ON ".$model['table'].'.'.$field." = ".$opts['link'];
                  
                  if ( $opts['source'] ) {
                      
                      $fields[] = $mode == 2 ? $model['table'].'.'.$field.' as '.$model['table'].'_'.$field : $opts['source'].' as '.str_replace('.', '_', $opts['source']);
                      
                  } else {
                  
                      $fields[] = $model['table'].'.'.$field.' as '.$model['table'].'_'.$field;
                  
                  }
            
            }
            
         
         }
         
         
         $q .= join (', ', $fields);
         
         $q .= " FROM ".$model['table'];
         
         $q .= join ('', $relations);
         
         if ( !empty( $options['where'] ) ) $q .= ' WHERE '.join(' ', $options['where']);
         
         if ( !empty( $options['order'] ) ) $q .= ' ORDER BY '.join(', ', $options['order']);
         
         //echo '<p>'.$q.'</p>';
         
         return db_query($q);
         
    }
    
    
    
    function model_get_header($model, $mode = 1){
        
        $model = util_json_encode($model);
        
        $header = [];
        
        $enable = [3, $mode];
        
        foreach ($model['fields'] as $field) {
          
            if ( in_array ($field['view'], $enable)){
                 
                $field = array_merge(model_db_defoptions(), $field); 
                  
                $header[] = $field;
                
            }
            
                
        }
        
        return $header;
            
    }
    
    
    
    function model_build_field($name, $opts, $val = '', $label = true){
        
        $result = '';
        
        switch ($opts['type']){
        
            case "auto":
              
              $result = '<input type="hidden" name="'.$name.'" value="'.$val.'">';
              
              break;
            
            case "json":
            
              
            
            case "text":
                
              if ( $label ) $result .= '<label for="'.$name.'">'.$opts['teg'].'</label>';
                
              $result .= '<textarea id="'.$name.'" name="'.$name.'">'.$val.'</textarea>';    
                
              break;
            
            case "int":
              
              if ( $label ) $result .= '<label for="'.$name.'">'.$opts['teg'].'</label>';
              
              if ( $opts['link'] ) {
                  
                  $source = explode ('.', $opts['link']);
                  
                  $data = model_db_select(model_db_get($source[0]), [], 1);
                  
                  $result .= interface_select($data, $name, $val, '', $name);
              
              } else {
              
                  $result .= '<input id="'.$name.'" type="number" name="'.$name.'" value="'.$val.'">';  
              
              }
            
              break;
            
              
            default:
               
              if ( $label ) $result .= '<label for="'.$name.'">'.$opts['teg'].'</label>';
                
              $result .= '<input id="'.$name.'" type="text" name="'.$name.'" value="'.$val.'">';  
                
              break;  
        
        }
        
        return $result;
    
    }
    
    