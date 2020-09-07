<?php

    core_secret();
    
    function interface_select($data, $name,  $val = '', $class = '', $id = ''){
        
        $select = '';
        
        $select .= '<select name="'.$name.'"'.($class ? " class='$class'" : "").($id ? " id='$id'" : "").'>';
        
          while ($row = db_array($data)) {
          
              $select .= '<option'.($row[0] == $val ? ' selected':'').'>';
                  
                  $select .= $row[1];
              
              $select .= '</option>';
          
          }
        
        $select .= '</select>';
        
        return $select; 
        
    }
    