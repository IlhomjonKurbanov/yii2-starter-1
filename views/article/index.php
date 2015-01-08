<?php 
use Yii;
use yii\widgets\ListView;
?>

<?php $this->title = Yii::t('article', 'Articles')?>

<div id="article-index">
	<h1><?= Yii::t('article', 'Articles') ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => ['hideOnSinglePage' => true],
        'itemView' => '_item'
    ])?>
</div>