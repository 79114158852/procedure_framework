var code = '';

$(document).ready(function(){
    
     setInterval(check, 5000);
    
});   



function check(){
      
      console.log('check');
      
      var tr = $('.for-check:first');
      
      if(!$(tr).length) return false;
      
      var id = $(tr).attr('data');
      
      var isbn = $(tr).attr('data-isbn');
      
      $.ajax({type:"POST", url: "/books/check.php", data: "id="+id+"&isbn="+isbn,

        success: function(result){
              
            result = JSON.parse(result);
            
            $(tr).find('.book-title').html(result.title);  
            
            $(tr).find('.book-description').html(result.description);  
            
            if(result.img != '') $(tr).find('.book-img').html('<img src="/books/assets/img/' + result.img + '">');  
            
            $(tr).find('.book-checked').html('Да');  
            
            $(tr).removeClass('for-check');
            
        },
        
        error: function(){
            
            console.log('Ошибочка...');
        
        }

    });

}


function add_code(code){
      
      $.ajax({type:"POST", url: "/books/add_code.php", data: "code="+code,

        success: function(result){
              
            result = JSON.parse(result);
            
            var img = '';
            
            if(result.row.img != '') img = '<img src="/books/assets/img/' + result.row.img + '">';
            
            var check = '';

            var check_text = 'Да';
            
            if(result.row.checked == 0){
            
              check = ' for-check';
              
              check_text = 'Нет';
              
            }  
            
            row = '<tr class="row_' + result.row.id + check + '" data="' + result.row.id + '" data-isbn="' + result.row.isbn + '"><td>' + result.row.isbn + '</td><td>' + result.row.total + '</td><td class="book-title">' + result.row.title + '</td><td class="book-description">' + result.row.description + '</td><td class="book-img">' + img + '</td><td class="book-checked">' + check_text + '</td></tr>';
              
            switch(result.mode){
                
                case "append":
                    
                  $('.wrapper table').append(row);  
                
                  break;
                  
                case "replace":
                  
                  $('.row_' + result.row.id).replaceWith(row);
                  
                  break;  
            
            }
            
            $('.wrapper table tr').removeClass('last');
            
            $('.row_' + result.row.id).addClass('last');
                        
            var elementClick = $('.row_' + result.row.id);
            
            var destination = $(elementClick).offset().top;
            
            $('html, body').animate({ scrollTop: destination }, 600);
            
            return false;
            
        },
        error: function(){
            
            console.log('Ошибочка...');
        
        }

    });

}



$(document).keypress(function(e){
         
        console.log(String.fromCharCode(e.which));
         
        if(e.keyCode != 13){
         
              var key = String.fromCharCode(e.which); 
            
              code = code + key;
              
        }else{
        
              add_code(code);
              
              code = '';
              
              $('.wrapper input[type="text"]').val('');
        
        }
      
});