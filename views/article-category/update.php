<?php

use yii\helpers\Html;

$this->title = Yii::t('article', 'Update Article Category') . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('article', 'Update');
?>

<div class="article-category-update">

    <?= $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
    ]) ?>
    
</div>
