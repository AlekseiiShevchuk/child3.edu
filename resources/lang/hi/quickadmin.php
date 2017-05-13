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
	'qa_create' => 'बनाइए (क्रिएट)',
	'qa_save' => 'सुरक्षित करे ',
	'qa_edit' => 'संपादित करे (एडिट)',
	'qa_view' => 'देखें',
	'qa_update' => 'सुधारे ',
	'qa_list' => 'सूची',
	'qa_no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'qa_logout' => 'लोग आउट',
	'qa_add_new' => 'नया समाविष्ट करे',
	'qa_are_you_sure' => 'आप निस्चित है ?',
	'qa_back_to_list' => 'सूची पे वापस जाए',
	'qa_dashboard' => 'डॅशबोर्ड ',
	'qa_delete' => 'मिटाइए',
	'quickadmin_title' => 'Тесты для детей | Админ панель',
];