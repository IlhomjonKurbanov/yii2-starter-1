<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = Yii::t('article', 'Update Article') . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('article', 'Update');
?>

<div class="article-update">

    <?= $this->render('_form', [
                'model' => $model,
                'categories' => $categories,
    ]) ?>
    
</div>