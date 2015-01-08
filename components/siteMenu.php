<?php
namespace app\components;

use yii\base\Widget;

class siteMenu extends Widget
{
    public function run()
    {
        return $this->render('site_menu');
    }
}
?>