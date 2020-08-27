<?php
    
    ini_set('display_errors', 'on');
    
    error_reporting(E_ALL);
    
    session_start();
    
    define('__ROOT__', __DIR__);
    
    core_require_file(__DIR__.'/lib/system/lib.message.php');
    
    core_require_file(__DIR__.'/lib/system/lib.utils.php');
    
    define('__CONFIG__', core_config_get());
    
    core_require_file(__DIR__.'/lib/system/lib.db.php');
    
    core_require_file(__DIR__.'/lib/system/lib.module.php');
    
    core_require_file(__DIR__.'/lib/system/lib.user.php');
    
    foreach(__CONFIG__['db'] as $name => $options){
          
        $app_db[] = ['name'=>$name, 'link' => db_create_connect($options), 'type' => $options['type']];
    
    }
    
    function core_require_file($file, $mode = 'require', $once = true){
      
      #Подключение файла и вывод сообщения в случае его отсутсвия
      
      if ( file_exists($file) ) {
                    
          switch ( $mode ){
          
              case "include":
                
                $once ? include_once($file) : include($file);
                
                return true;

                break;
              
              default:
                
                return file_get_contents($file);
                
                break;
               
              case "require": 
                
                $once ? require_once($file) : require($file);
                
                return true;

                break;

          }
                    
      } else {
          
          message_add('Файл <b>'.$file.'</b> не существует!','fatal');
          
          return false;
          
      }
    
    }
    
    
    
    
    
    
    
    
    function core_secret(){
        
        #Проверка, что доступ к файлу осуществляется через ядро
        
        $secret = core_config_get('app_secret'); 
        
        if (__CONFIG__['app_secret'] != $secret) message_add('Доступ к файлу запрещен!', 'fatal');
    
    }
    
    
    
    
    
    function core_config_get($index = ''){
    
        #Возвращает указанный параметр конфигурации или конфигурацию целиком
        
        $config = core_require_file(__DIR__.'/../config.php', 'get');
        
        if ( !$config ) message_add('Файл конфигурации не найден!', 'fatal');
        
        $config  = utils_json_encode($config);
        
        return $index  == '' ? $config : $config[$index] ; 
    
    }
    