{
  "table" : "sys_page",
  "fields": {
                 "id"      : {
                                "teg"       : "#",
                                "type"      : "auto", 
                                "view"      : 3
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
                                "link"      : "sys_access.score"
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
                  "css"   : {
                                "teg"       : "Дополнительные файлы CSS",
                                "type"      : "text", 
                                "view"      : 2
                             },                                                              
                  "js"   : {
                                "teg"       : "Дополнительные файлы JS",
                                "type"      : "text", 
                                "view"      : 2
                             },
                  "header"   : {
                                "teg"       : "Шаблон (header)",
                                "type"      : "filename", 
                                "view"      : 3
                             },
                  "body"   : {
                                "teg"       : "Шаблон (body)",
                                "type"      : "filename", 
                                "view"      : 3
                             },                               
                  "footer"   : {
                                "teg"       : "Шаблон (footer)",
                                "type"      : "filename", 
                                "view"      : 3
                             }
    
                         
            }
  
}