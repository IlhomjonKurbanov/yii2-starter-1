<?php
use Yii;
use yii\helpers\Html;

$this->title = Yii::t('article', 'Articles')?>
<div class="row">
	<div class="col-xs-12">
		<h2><?= Html::a(Html::encode($model->title), ['view', 'id'=>$model->id])?></h2>
	</div>
</div>