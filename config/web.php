<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'starter',
	'language' => 'en',
	'sourceLanguage' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'localeUrls'],
	'modules' => [
		'user' => [ // used in frontend for log in/out
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['admin']
		],
		'users' => [ // used in backend for manage users
				'class' => 'dektrium\user\Module',
				'layoutPath' => '@app/views/layouts',
				'layout' => 'admin',
				'enableUnconfirmedLogin' => true,
				'confirmWithin' => 21600,
				'cost' => 12,
				'admins' => ['admin']
		],
	],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'zI3lY8AW7pQGUkMcDvQE6_5zobC7AtCE',
        	'enableCsrfValidation' => true,
        ],
    	'localeUrls' => [
    		'class' => 'codemix\localeurls\LocaleUrls',
			// List all supported languages here
			'languages' => ['en', 'uk', 'ru']
   		],
    	'urlManager' => [
    		'class' => 'codemix\localeurls\UrlManager', // comment this line for disable multilanguage
    		'enablePrettyUrl' => true,
    		'showScriptName' => false,
    		'rules' => [
    				'' => 'site/index',
    				['pattern'=>'page/<alias>', 'route'=>'pages/view'],
    				['pattern'=>'article/<id:\d+>','route' => 'article/view']
    		]
    	],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authClientCollection' => [
    		'class' => 'yii\authclient\Collection',
    		'clients' => require(__DIR__ . '/social.php'),
    	],
    	'i18n' => [
    	   'translations' => [
    	       '*'=>[
    	           'class' => 'yii\i18n\PhpMessageSource',
    	           'basePath'=>'@app/messages',
    	       ],
    	   ],
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
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
