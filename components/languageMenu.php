<?php
namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class languageMenu extends Widget
{
	public $items;
	
	public function init()
	{
		if( ! isset( $this->items ) )
		{
			if( isset( Yii::$app->localeUrls->languages ) )
			{
				$this->items = Yii::$app->localeUrls->languages;
			}
			else 
			{
				throw new NotFoundHttpException(Yii::t('language', 'Array of available languages is not set in config file.'));
			}
		}
		
	}
	
	public function run()
	{
		$route = Yii::$app->controller->route;
		$appLanguage = Yii::$app->language;
		$params = $_GET;
		
		array_unshift($params, $route);
		
		foreach ($this->items as $key => $language) 
		{
			if ( $language === $appLanguage ) 
			{
				unset($this->items[$key]);
				continue;
			}
			$params['language'] = $language;
			$this->items[$key] = [
				'label' => Html::img(Url::base()."/img/flag/{$language}.png").' '.$language,
				'title' => Yii::t('language', $language),
				'url' => $params,
			];
		}
		
		
		
		return $this->render('language_menu', 
				[
						'items'=> $this->items, 
						'title' =>  Yii::t('language', $appLanguage),
						'currentLanguage' => Html::img(Url::base()."/img/flag/{$appLanguage}.png").' '.$appLanguage 
				]);
	}
}