<?php

    core_secret();
    
    $options = util_json_encode($vars['sys_module_options']);
    
    if ( $options['redirect'] == 'back') $options['redirect'] = $_SESSION['back'] ?? '/';
    
    if (isset ( $_POST['login'] ) && isset ( $_POST['pass'] ) ) user_login($_POST['login'], $_POST['pass'], $options['redirect']);
    
    require('tpl/default.tpl');
    
    
    
    