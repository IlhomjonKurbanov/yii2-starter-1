<?php
$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('article', 'Articles'),
    'url' => [
        'index'
    ]
];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
	<h1><?= $model->title ?></h1>
    <?= $model->body?>
</div>