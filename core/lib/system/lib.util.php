<?php

    function util_array($arr){
        
        echo '<pre>'; print_r($arr); echo '</pre>';
    
    }
    
    
    function utils_json_encode($string, $assoc = true,  $fatal = true, $options = ''){
        
        $string = $assoc ? json_decode($string, true) : json_decode($string);
        
        if(json_last_error() && $fatal) message_add('Ошибка парсинга конфигурации: '.json_last_error_msg().'!', 'fatal');
        
        return $string;
    
    }