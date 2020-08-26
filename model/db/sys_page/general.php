{
  "table" : "sys_page",
  "fields": {
                 "id"      : {
                                "teg"       : "#",
                                "type"      : "auto" 
                             },
                  "link"   : {
                                "teg"       : "Путь",
                                "type"      : "varchar(250)", 
                                "sort"      : 1,
                                "filter"    : 1, 
                                "view"      : 3
                             },
                  "title"   : {
                                "teg"       : "Заголовок",
                                "type"      : "varchar(250)", 
                                "sort"      : 1,
                                "filter"    : 1, 
                                "view"      : 3
                             },              
                  "access"   : {
                                "teg"       : "Доступ",
                                "type"      : "int", 
                                "sort"      : 1,
                                "filter"    : 1, 
                                "view"      : 3,
                                "source"    : "sys_access.name",
                                "link"      : "sys_access.id"
                             },              
                  "meta_desc"   : {
                                "teg"       : "Description",
                                "type"      : "varchar(100)", 
                                "view"      : 2
                             }, 
                  "meta_keys"   : {
                                "teg"       : "Keywords",
                                "type"      : "varchar(150)", 
                                "view"      : 2
                             },                
                  "templates"   : {
                                "teg"       : "Шаблоны",
                                "type"      : "json", 
                                "view"      : 2
                             },
                  "css"   : {
                                "teg"       : "Дополнительные файлы CSS",
                                "type"      : "text", 
                                "view"      : 2
                             },                                                              
                  "js"   : {
                                "teg"       : "Дополнительные файлы JS",
                                "type"      : "text", 
                                "view"      : 2
                             }                                                                                       
    
                         
            }
  
}