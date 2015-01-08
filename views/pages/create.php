<?php
use yii\helpers\Html;

$this->title = Yii::t('page', 'Create {modelClass}', ['modelClass' => 'Page']);

$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>