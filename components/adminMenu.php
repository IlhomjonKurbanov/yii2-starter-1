<?php
namespace app\components;

use Yii;
use yii\base\Widget;

class adminMenu extends Widget
{
    public $menuItems;
    
    private function makeMenu($items, $menuCssClass = '')
    {
        $output = "<ul class='{$menuCssClass}'>";
        foreach($items as $item)
        {
            if(empty($item['items'])) {
                $output .= '<li><a href="'.\yii\helpers\Url::to($item['url']).'">';
                if(!empty($item['icon']))
                    $output .= "<i class='{$item['icon']}'></i>";
                $output .= "<span>{$item['label']}</span></a></li>".PHP_EOL;
            }
            else
            {
                $output .= '<li class="treeview"><a href="#">';
                if(!empty($item['icon']))
                    $output .= "<i class='{$item['icon']}'></i>";
                $output .= "<span>{$item['label']}</span><i class='fa fa-angle-left pull-right'></i></a>";
                $output .= $this->makeMenu($item['items'], 'treeview-menu');
                $output .= '</li>'.PHP_EOL;
            }
        }
        return PHP_EOL . $output . '</ul>' . PHP_EOL;
    }
    
    public function init()
    {
       $this->menuItems = [
        ['label'=>Yii::t('admin','Dashboard'), 'icon'=>'fa fa-dashboard', 'url'=>['/admin/index']],
        ['label'=>Yii::t('admin','Database'), 'icon'=>'fa fa-database', 'url'=>['/admin/db']],
        ['label' => Yii::t('admin','Users management'), 'icon'=>'fa fa-user-md', 'url' => ['/users/admin/index']],
        [
        	'label'=>Yii::t('admin','Articles'),
        	'icon'=>'fa fa-bars',
        	'items'=>[
        		['label'=>Yii::t('admin','Add'), 'icon'=>'fa fa-plus', 'url'=>['/article/create']],
            	['label'=>Yii::t('admin','Browse'), 'icon'=>'fa fa-tasks', 'url'=>['/article/browse']],
        		['label'=>Yii::t('admin','Article Categories'), 'icon'=>'fa fa-bars', 'url'=>['/article-category/index']],
            ],
        ],
        [
            'label'=>Yii::t('admin','Pages'),
            'icon'=>'fa fa-pagelines',
            'items'=>[
            	['label'=>Yii::t('admin','Add'), 'icon'=>'fa fa-plus', 'url'=>['pages/create']],
                ['label'=>Yii::t('admin','Browse'), 'icon'=>'fa fa-tasks', 'url'=>['pages/index']],
            ],
        ],
    	];
    }
    
    public function run()
    {
        return $this->render('admin_menu', ['data'=> $this->makeMenu($this->menuItems, 'sidebar-menu')]);
    }
}
?>