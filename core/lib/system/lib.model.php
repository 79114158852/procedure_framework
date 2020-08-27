<?php

    core_secret();
    
    function model_db_get ( $path , $name = 'general') {
        
        $path .= '/'.$name.'.php';
        
        $model = core_require_file(__ROOT__.'/../model/db/'.$path, 'get');
        
        return $model;
        
    }
    
    
    function model_db_defoptions(){
        
        return ['teg' => '', 'type' => 'int', 'sort' => '0', 'filter' => '0', 'view' => '1', 'source' => '', 'link' => ''];
    
    }
    
    function model_db_select($model, $options, $mode = 1){
          
         $model = utils_json_encode($model);
         
         $q = "SELECT ";
         
         $fields = [];
         
         $links = [];
         
         foreach ( $model['fields'] as $field => $opts ) {
            
            $opts = array_merge(model_db_defoptions(), $opts);
            
            if ( $opts['view'] < $mode ) continue;
            
            if ( $opts['link'] && $mode != 2) $links[] = " LEFT JOIN ".preg_replace('/\..*/u', '',  $opts['link'])." ON ".$model['table'].'.'.$field." = ".$opts['link'];
            
            if ( $opts['source'] ) {
                
                $fields[] = $mode == 2 ? $model['table'].'.'.$field.' as '.$model['table'].'_'.$field : $opts['source'].' as '.str_replace('.', '_', $opts['source']);
                
            } else {
            
                $fields[] = $model['table'].'.'.$field.' as '.$model['table'].'_'.$field;
            
            }
            
         
         }
         
         
         $q .= join (', ', $fields);
         
         $q .= " FROM ".$model['table'];
         
         $q .= join ('', $links);
         
         if ( !empty( $options['where'] ) ) $q .= ' WHERE '.join(' ', $options['where']);
         
         if ( !empty( $options['order'] ) ) $q .= ' ORDER BY '.join(', ', $options['order']);
         
         return db_query($q);
         
    }
    
    