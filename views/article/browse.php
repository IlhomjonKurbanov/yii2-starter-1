<?php
use yii\helpers\Html;
use yii\grid\GridView;
use Yii;

$this->title = Yii::t ( 'article', 'Articles' );
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="article-index">
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p>
<?=Html::a ( Yii::t ( 'article', 'Create Article'), [ 'create' ], [ 'class' => 'btn btn-success' ] )?>
</p>
<?=GridView::widget ( [ 
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [ 
		'id',
		'slug',
		'title',
		[ 
			'attribute' => 'category_id',
			'value' => function ($model) {return $model->category ? $model->category->title : null;},
			'filter' => \yii\helpers\ArrayHelper::map ( \app\models\ArticleCategory::find ()->all (), 
			'id', 
			'title' ) ],
		[ 
			'attribute' => 'author_id',
			'value' => function ($model) {return $model->author->username;} 
		],
		[ 
			//'class' => \app\components\grid\EnumColumn::className (),
			'attribute' => 'status',
			//'enum' => [ Yii::t ( 'backend', 'Disabled' ),Yii::t ( 'backend', 'Enabled' ) ] 				
		],
		'published_at:datetime',
		'created_at:datetime',
		// 'updated_at',
		[ 'class' => 'yii\grid\ActionColumn','template' => '{update} {delete}' ] 
		] ] );?>
</div>