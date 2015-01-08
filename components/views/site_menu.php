<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\languageMenu;


NavBar::begin ( [ 
		'brandLabel' => Yii::t('app', Yii::$app->params['siteName']),
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [ 
				'class' => 'navbar-inverse navbar-fixed-top' 
		] 
] );

//language dropdown
if( Yii::$app->urlManager instanceof codemix\localeurls\UrlManager)
{
	echo languageMenu::widget();
}

echo Nav::widget ( [ 
		'options' => [ 
				'class' => 'navbar-nav navbar-right' 
		],
		'items' => [ 
				[ 
					'label' => Yii::t('app', 'Home'),
					'url' => ['/site/index'] 
				],
				[ 
					'label' => Yii::t('app', 'Article'),
					'url' => ['/article'] 
				],
				app\helpers\App::isAdmin () ? [ 
					'label' => Yii::t('app', 'Admin'),
					'url' => ['/admin'] 
				] : '',
				[ 
					'label' => Yii::t('app', 'About'),
					'url' => ['/page/about'] 
				],
				[ 
					'label' => Yii::t('app', 'Contact'),
					'url' => ['/site/contact'] 
				],
				Yii::$app->user->isGuest ? [ 
					'label' => Yii::t('app', 'Login'),
					'url' => ['/user/security/login'] 
				] : [ 
					'label' => Yii::$app->user->identity->username,
					'items' => [ 
								[ 
									'label' => Yii::t('app', 'Logout'),
									'url' => ['/user/security/logout'],
									'linkOptions' => ['data-method' => 'post'] 
								],
								[ 
									'label' => Yii::t('app', 'Profile'),
									'url' => ['/user/profile'] 
								],
								[ 
									'label' => Yii::t('app', 'Setting'),
									'url' => ['/user/settings'] 
								]
						] 
				] 
		] 
] );

		
NavBar::end ();