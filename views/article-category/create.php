<?php
use yii\helpers\Html;

$this->title = Yii::t('article', 'Create Article Category');

$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-category-create">
    <?= $this->render('_form', ['model' => $model, 'categories' => $categories]) ?>
</div>