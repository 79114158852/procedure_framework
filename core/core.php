<?php
    
    ini_set('display_errors', 'on');
    
    error_reporting(E_ALL);
    
    session_start();
    
    define('__ROOT__', __DIR__);
    
    require_once __DIR__.'/lib/system/lib.message.php';
    
    require_once  __DIR__.'/lib/system/lib.util.php';
    
    define('__CONFIG__', core_config_get());
    
    require_once __DIR__.'/lib/system/lib.db.php';
    
    require_once __DIR__.'/lib/system/lib.module.php';
    
    require_once __DIR__.'/lib/system/lib.user.php';
    
    require_once __DIR__.'/lib/system/lib.template.php';
    
    foreach(__CONFIG__['db'] as $name => $options){
          
        $app_db[] = ['name'=>$name, 'link' => db_create_connect($options), 'type' => $options['type']];
    
    }
    
    
    function core_file_exist ( $file ) {
    
        return file_exists ( $file )  && is_file ( $file ) ? true : false;
    
    }
    
    
   
    
    
    
    
    
    
    
    
    function core_secret(){
        
        #Проверка, что доступ к файлу осуществляется через ядро
        
        $secret = core_config_get('app_secret'); 
        
        if (__CONFIG__['app_secret'] != $secret) message_add('Доступ к файлу запрещен!', 'fatal');
    
    }
    
    
    
    
    
    function core_config_get($index = ''){
    
        #Возвращает указанный параметр конфигурации или конфигурацию целиком
        
        $file = __DIR__.'/../config.php';
        
        if ( !core_file_exist ( $file ) ) message_add('Файл конфигурации не найден!', 'fatal');
        
        $config  = util_json_encode(file_get_contents($file));
        
        return $index  == '' ? $config : $config[$index] ; 
    
    }
    