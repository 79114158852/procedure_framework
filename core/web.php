<?php

    require 'core.php';
    
    core_require_file(__DIR__.'/lib/system/lib.web.php');
    
    core_require_file(__DIR__.'/lib/system/lib.page.php');
    
    core_require_file(__DIR__.'/lib/system/lib.model.php');
    
    web_route();