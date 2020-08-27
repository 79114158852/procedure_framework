{
	"table": "sys_user",
	"fields": {
		"id": {
			"type": "auto",
			"teg": "#", 
			"view":3
		},
		"name": {
			"type": "varchar(250)",
			"teg": "Имя пользователя",
			"required": true,
			"sort": 1,
			"view": 3,
			"filter": 1
		},
		"login": {
			"type": "varchar(250)",
			"teg": "Логин",
			"sort": 1,
			"view": 3,
			"filter": 1
		},
		"pass": {
			"type": "pass(250)",
			"teg": "Пароль",
			"sort": 0,
			"view": 2,
			"filter": 0
		},
"access"   : {
      "teg"       : "Доступ",
      "type"      : "int", 
      "sort"      : 1,
      "filter"    : 1, 
      "view"      : 3,
      "source"    : "sys_access.name",
      "link"      : "sys_access.score"
    }              
	}
}