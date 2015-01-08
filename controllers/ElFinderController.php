<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use zxbodya\yii2\elfinder\ConnectorAction;
use zxbodya;

class ElFinderController extends Controller
{
	public function actions()
	{
		return [
				'tinyMceCompressor' => [
						'class' => zxbodya\yii2\tinymce\TinyMceCompressorAction::className(),
				],
				'connector' => array(
						'class' => zxbodya\yii2\elfinder\ConnectorAction::className(),
						'settings' => array(
								'root' => Yii::getAlias('@webroot') . '/uploads/',
								'URL' => Yii::getAlias('@web') . '/uploads/',
								'rootAlias' => 'Home',
								'mimeDetect' => 'none'
						)
				),
		];
	}
}