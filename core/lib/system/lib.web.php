<?php

    core_secret();
        
    function web_route(){
        
        #������
        
        page_find();
        
        
        
        
        
        
        
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
    
    
    
    