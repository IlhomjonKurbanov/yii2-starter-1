<?php
use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <h1><?= Html::encode($model->title) ?></h1>
    <br />
    <?= $model->body ?>
</div>