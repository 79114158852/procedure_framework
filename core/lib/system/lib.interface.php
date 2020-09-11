<?php

    core_secret();
    
    function interface_select($data, $name,  $val = '', $class = '', $id = '', $empty = false){
        
        $select = '';
        
        $select .= '<select name="'.$name.'"'.($class ? " class='$class'" : "").($id ? " id='$id'" : "").'>';
        
          if ($empty) $select .= '<option value="">Не выбрано</option>';
        
          while ($row = db_array($data)) {
              
              $select .= '<option'.($row[0] == $val ? ' selected':'').' value="'.$row[0].'">';
                  
                  $select .= $row[1];
              
              $select .= '</option>';
          
          }
        
        $select .= '</select>';
        
        return $select; 
        
    }
    