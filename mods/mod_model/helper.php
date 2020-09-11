<?php

    core_secret();
      
    if ($_POST['id'] > 0) { 
    
        $query = model_db_update($model, $_POST);
        
        $redirect = '';
        
    } else {
        
        $query = model_db_insert($model, $_POST); 
        
        $id = model_db_max($model);
        
        $redirect = '/'.web_get_urn().'?id='.$id."&back=".$_GET['back'];
        
    }
      
    if ($query) {
    
        message_add('Записано!', 'success');
    
    } else {
    
        message_add('Ошибка записи', 'error');
    
    }
        
    web_redirect($redirect);
    
    die();
      
    