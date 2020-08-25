  $(document).ready(function(){
      
      createEditor();
      
      $('body').on('change', '.admin_content_table th input[type="checkbox"]', function(){
          
          var parent = $(this).parent('th').parent('tr').parent('tbody').parent('table');
          
          $(parent).find('td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
      
      });
      
      
      $('body').on('click', '.get_full_info', function(){
          
          var target = $(this).parent('td').find('.full_info');
          
          var pin = prompt('Введите пин-код: ');
          
          if (pin != '' && pin != 'undefined'){
          
              $.ajax({type:"POST", url: "/ajax.php", data: "pin="+ pin + "&id=" + $(this).attr('data'),
               
                  success: function(result){
                    
                    $(target).html(result);
                    
                  },
          
                  error: function(){
                    
                    console.log('error');
             
                  }
        
              });              
          
          }
      
      });

  });

  function createEditor(){
    
    tinymce.execCommand('mceRemoveEditor', false, 'editor');
      
    tinymce.init({
      branding: false,
      language:'ru',
      images_upload_handler: function (blobInfo, success, failure){
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', '/jobcrm/libs/tiny.php');

      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.location);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());

      xhr.send(formData);
      },
      images_upload_base_path: '/jobcrm/img/',
      menubar: false,
      height:200,
      plugins: ["colorpicker contextmenu lists table textcolor visualblocks code link image"],
      toolbar: 'undo redo | formatselect fontsizeselect | bold italic | forecolor backcolor | bullist numlist | code | link | image | removeformat',
      selector: '.editor'
      
    });    
  
  }
