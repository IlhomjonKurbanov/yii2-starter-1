<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('article', 'Article Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-category-view">
    <p>
        <?= Html::a(Yii::t('article', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('article', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('article', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
        ]) ?>
    </p>
    
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'slug',
                'title',
                'status',
            ],
    ]) ?>
    
</div>