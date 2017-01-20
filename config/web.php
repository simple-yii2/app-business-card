<?php

$urlManager = require(__DIR__ . '/url.php');

$config = [
	'id' => 'business-card',
	'name' => 'My Company',
	'language' => 'en-US',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log', 'storage'],
	'modules' => [
		'uploadimage' => 'dkhlystov\uploadimage\Module',
		'cms' => 'cms\Module',
		'page' => 'cms\page\frontend\Module',
		'contact' => 'cms\contact\frontend\Module',
		'news' => 'cms\news\frontend\Module',
		'feedback' => 'cms\feedback\frontend\Module',
	],
	'components' => [
		'request' => [
			// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
			'cookieValidationKey' => '',
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'user' => [
			'class' => 'cms\user\common\components\User',
			'identityClass' => 'cms\user\common\models\User',
			'loginUrl' => ['user/login/index'],
			'enableAutoLogin' => true,
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => true,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => require(__DIR__ . '/db.php'),
		'urlManager' => $urlManager,
		'frontendUrlManager' => $urlManager,
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
		'assetManager' => [
			'forceCopy' => YII_DEBUG,
		],
		'storage' => [
			'class' => 'dkhlystov\storage\components\FileStorage',
		],
		'view' => [
			'class' => 'cms\seo\frontend\components\View',
		],
	],
];

if (YII_ENV_DEV) {
	// configuration adjustments for 'dev' environment
	$config['bootstrap'][] = 'debug';
	$config['modules']['debug'] = [
		'class' => 'yii\debug\Module',
	];
}

return $config;
