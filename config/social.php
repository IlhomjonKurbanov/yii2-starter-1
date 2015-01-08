<?php
return [ 
		'google' => [ 
			'class' => 'yii\authclient\clients\GoogleOpenId' 
		],
		'facebook' => [ 
			'class' => 'yii\authclient\clients\Facebook',
			'clientId' => '',
			'clientSecret' => '' 
		],
		'linkedin' => [ 
			'class' => 'yii\authclient\clients\LinkedIn',
			'clientId' => '',
			'clientSecret' => '' 
		] 
];