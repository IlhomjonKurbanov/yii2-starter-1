<?php $this->title = Yii::t('admin', 'Database operations')?>
<?php if( !empty($msg) ): ?>
	<div class="alert alert-success">
		<?= $msg; ?>
	</div>
<?php endif;?>

<h1><?= \Yii::t('admin', 'Database operations'); ?></h1>
<br />
<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
?>

	<?= Html::a(\Yii::t('admin','Backup'), Url::to(['backup']), ['class' => 'btn btn-success btn-lg']); ?>
	&nbsp;&nbsp;&nbsp;
	<?= Html::a(\Yii::t('admin','Restore'), Url::to(['restore']), ['class' => 'btn btn-warning btn-lg']); ?>
