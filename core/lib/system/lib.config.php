<?php

    core_secret();
    
    function config_get($index = ''){
    
        #Возвращает указанный параметр конфигурации или конфигурацию целиком
        
        if ( !core_require_file('some_file.txt') ) message_add('Файл конфигурации не найден!', 'fatal');
    
    }