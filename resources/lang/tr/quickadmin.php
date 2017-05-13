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
	'qa_create' => 'Oluştur',
	'qa_save' => 'Kaydet',
	'qa_edit' => 'Düzenle',
	'qa_view' => 'Görüntüle',
	'qa_update' => 'Güncelle',
	'qa_list' => 'Listele',
	'qa_no_entries_in_table' => 'Tabloda kayıt bulunamadı',
	'custom_controller_index' => 'Özel denetçi dizini.',
	'qa_logout' => 'Çıkış yap',
	'qa_add_new' => 'Yeni ekle',
	'qa_are_you_sure' => 'Emin misiniz?',
	'qa_back_to_list' => 'Listeye dön',
	'qa_dashboard' => 'Kontrol Paneli',
	'qa_delete' => 'Sil',
	'quickadmin_title' => 'Тесты для детей | Админ панель',
];