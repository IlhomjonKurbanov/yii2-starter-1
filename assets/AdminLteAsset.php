<?php
namespace app\assets;

use yii\web\AssetBundle;


class AdminLteAsset extends AssetBundle
{
	public $sourcePath = '@bower/';
	public $css = ['admin-lte/css/AdminLTE.css', 'font-awesome/css/font-awesome.min.css'];
	public $js = ['admin-lte/js/AdminLTE/app.js'];
	public $depends = [
			'yii\web\YiiAsset',
			'yii\bootstrap\BootstrapAsset',
			'yii\bootstrap\BootstrapPluginAsset',
	];
}