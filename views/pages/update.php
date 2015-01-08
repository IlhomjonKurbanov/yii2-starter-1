<?php

use yii\helpers\Html;

$this->title = Yii::t('page', 'Update {modelClass}: ', ['modelClass' => 'Page']) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('page', 'Update');
?>

<div class="page-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>