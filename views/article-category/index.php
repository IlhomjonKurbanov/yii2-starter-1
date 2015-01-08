<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('article', 'Article Categories');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-category-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a(Yii::t('article', 'Create Article Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'slug',
                'title',
                'status',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template'=>'{update} {delete}'
                ],
            ],
    ]); ?>

</div>