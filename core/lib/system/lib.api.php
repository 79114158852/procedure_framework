<?php

    core_secret();
    
    
    function api_route(){
        
        echo $_SERVER['REQUEST_URI'];
    
    }