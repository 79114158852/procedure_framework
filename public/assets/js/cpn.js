$(document).ready(function(){


          $("#sort").tablesorter({
               headers: {
               '.dont-sort' :{sorter: false}
               } 
          });

          
          $("body").on("click", "#sort td", function(){
          
              if(!$(this).hasClass('no-action')){
                  
                  location.replace($(this).parent('tr').attr('data'));
                  
              }    
          
          });
          

});