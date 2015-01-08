<?php
namespace app\helpers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class App
{
	public static function isAdmin()
	{
		if(isset(\Yii::$app->user->identity))
			return in_array( \Yii::$app->user->identity->username, \Yii::$app->modules['user']->admins );
		else
			return false;
	}
	public static function hasRole($role)
	{
		return ( \Yii::$app->user->identity->role == $role );
	}
	
}