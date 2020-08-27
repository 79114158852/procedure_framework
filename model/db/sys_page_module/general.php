{
	"table": "sys_page_module", 
	"fields": {
		"module_id": {
			"type": "int",
			"view": 3,
			"teg": "ID_module"
		},
		"page_id": {
			"type": "int",
			"view": 3,
			"teg": "ID_page"
		},
		"position": {
			"type": "varchar(50)",
			"teg": "Позиция",
			"view": 3
		},
		"ordering": {
			"type": "ordering",
			"teg": "Порядок"
		}
	}
}