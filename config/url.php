<?php

return [
	'class' => 'yii\web\UrlManager',
	'enablePrettyUrl' => true,
	'showScriptName' => false,
	'rules' => [
		['pattern' => 'cms', 'route' => '/cms/default/index'],
		['pattern' => 'cms/login', 'route' => '/cms/user/login/index'],
		['pattern' => 'cms/logout', 'route' => '/cms/user/logout/index'],
		['pattern' => 'contacts', 'route' => '/contact/contact/index', 'suffix' => '.html'],
		['pattern' => 'news', 'route' => '/news/news/index'],
		['pattern' => 'news/<alias:[\w\-]+>', 'route' => '/news/news/view', 'suffix' => '.html'],
		['pattern' => 'feedback', 'route' => '/feedback/feedback/index'],
		['pattern' => '<alias:[\w\-]+>', 'route' => '/page/page/index', 'suffix' => '.html'],
	],
];
