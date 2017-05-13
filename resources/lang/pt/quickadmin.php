<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'categoties' => [		'title' => 'Категории',		'created_at' => 'Time',		'fields' => [			'name' => 'Имя категории',		],	],
		'lessons' => [		'title' => 'Уроки',		'created_at' => 'Time',		'fields' => [			'name' => 'Название урока',			'description' => 'Описание урока',			'category' => 'К какой категории относится урок',		],	],
		'slides' => [		'title' => 'Слайды',		'created_at' => 'Time',		'fields' => [			'slider-type' => 'Тип слайда',			'name' => 'Название слайда',			'audio' => 'Аудио файл который будет автоматически проигран при открытии слайда',			'content' => 'Контент слайда',			'lesson' => 'Какому уроку принадлежит слайд',			'is-active' => 'Активен ли слайд (доступен ли для просмотра пользователями)',		],	],
		'answers' => [		'title' => 'Варианты ответов',		'created_at' => 'Time',		'fields' => [			'text-answer' => 'Текстовый ответ (оставить пустым если ответ картинка)',			'image-answer' => 'Ответ-картинка (оставить пустым если ответ текстовый)',			'is-correct' => 'Правильный ли это вариант ответа?',			'slide' => 'Для какого слайда ответ',		],	],
		'reactions' => [		'title' => 'Реакции на ответ',		'created_at' => 'Time',		'fields' => [			'type' => 'Для какого ответа реакция (правильного или неправильного)',			'title' => 'Заголовок окна с ответом',			'audio' => 'Аудио файл для автоматического проигрывания при открытии окна с реакцией на ответ',			'content' => 'Содержание окна с реакцией на ответ',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'quickadmin_title' => 'Тесты для детей | Админ панель',
];