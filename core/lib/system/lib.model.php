<?php

    core_secret();
    
    function model_db_get ( $path , $name = 'general1') {
        
        $path .= '/'.$name.'.php';
        
        $model = core_require_file(__ROOT__.'/../model/db/'.$path, 'get');
        
        if ( !$model ) message_add('Модель <b>'.$path.'<b> не найдена!', 'fatal');
        
    }