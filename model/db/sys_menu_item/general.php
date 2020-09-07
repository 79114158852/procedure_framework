{
                "table": "sys_menu_item",
                "fields": {
                  "id": {
                                "teg": "#",
                                "type":"auto",
                                "view":3
                  },
                  "name": {
                                "type": "varchar(250)",
                                "teg": "Пункт меню",
                                "sort": 1,
                                "view": 3,
                                "filter": 1
                  },
                  "options": {
                                "type": "json",
                                "teg": "Параметры",
                                "sort": 0,
                                "view": 2,
                                "filter": 0
                  },
                  "ordering": {
                                "type": "ordering",
                                "teg": "Порядок",
                                "sort": 0,
                                "view": 3,
                                "filter": 0
                  },
                  "menu_id"   : {
                                "teg"       : "Меню",
                                "type"      : "int", 
                                "sort"      : 1,
                                "filter"    : 1, 
                                "view"      : 3,
                                "source"    : "sys_menu.name",
                                "link"      : "sys_menu.id"
                             }
	}
}