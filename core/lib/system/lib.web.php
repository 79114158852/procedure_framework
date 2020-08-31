<?php

    core_secret();
        
    function web_route(){
        
        #������
        
        $user = user_init();
        
        $page = page_find();
        
        if ( $user['sys_user_access'] < $page['sys_page_access'] ) {
            
            message_add('���������� �����������...');
            
            web_redirect(core_config_get('auth'));
            
        }    
                
        template_render(template_get($page['sys_page_header']), $page);
        
        template_render(template_get($page['sys_page_body']), $page);
        
        template_render(template_get($page['sys_page_footer']), $page);
        
        /*echo file_get_contents('/var/www/holcity/views/_header.tpl');
        
        utils_array($page);
        
        utils_array($user);*/
        
    }
    
    
    function web_redirect($url = ''){
        
        #��������� ��������
        
        header('location: '.($url == '' ? $_SERVER['REQUEST_URI'] : $url));
        
    }
    
    
    function web_encode_url($url = ''){
        
        #�������� ������ � base64
        
        return base64_encode($url == '' ? $_SERVER['REQUEST_URI'] : $url);
        
    }
    
    
    function web_get_urn($link = '', $argument = false, $url = false){
        
        #���������� urn ��� uri
        
        if($link == '') $link = $_SERVER['REQUEST_URI'];
        
        #��������� ��������� �� ������
        
        if ( !$argument ) $link = preg_replace('/\?.*/', '', $link);
        
        #������� ������ ���� � ������
        
        $link = substr($link, 1); 
        
        #���� ����� uri ��������� url
        
        if ( $url ) $link = web_get_url().$link;
            
        return $link;
    
    }
    
    
    function web_get_url(){
        
        #���������� url
        
        $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        
        $url .= "://".$_SERVER['HTTP_HOST'];
        
        $url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
        
        return $url;
    
    }
    
    
    
    