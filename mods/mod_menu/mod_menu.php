<?php

    core_secret();
    
    $options = util_json_encode($vars['sys_module_options']);
    
    $model = model_db_get('sys_menu_item');
        
    $options['where'][] = 'sys_menu_item.menu_id = '.$options['menu'];
    
    $options['order'] = ['sys_menu_item.ordering'];
    
    $items = model_db_select($model, $options);
    
    $items = db_rows($items) > 0 ? db_assoc_all($items) : [];
    
    $menu = '';
    
    foreach ( $items as $item ) {
        
        $opts = util_json_encode($item['sys_menu_item_options']);
        
        $menu .= '<li'.($opts['link'] == '/'.web_get_urn() ? ' class="active"':'').'>';
        
        if($opts['link'] == 'delimiter'):
            
              $menu .= '<div class="'.($opts['class'] ?: '').'"></div>';
            
        else:
            
              $menu .= '<a href="'.$opts['link'].'">'.$opts['icon'].$item['sys_menu_item_name'].'</a>';
                
        endif;  
        
        $menu .= '</li>';
    
    }
    
    require 'tpl/default.tpl';