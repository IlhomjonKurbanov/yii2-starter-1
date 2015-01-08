<?php 
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\adminCollapsibleBlock;
?>
<?php $this->title = Yii::t('admin', 'Site dashboard')?>

<div class="row">
    
    <?php 	// System info dashboard widget sample
    		adminCollapsibleBlock::begin([
				'color' => 'green',
				'btn_type' => 'success',
				'icon' => 'fa-cog',
				'title' => 'System info',
				//'footer' => '<a href="#">footer</a>'
    		]);?>
    		<table class="table">
    			<tr>
    				<td>PHP version:</td>
    				<td><?= phpversion() ?></td>
    			</tr>
    			<tr>
    				<td>OS:</td>
    				<td><?= strtolower(php_uname('s r v')) ?></td>
    			</tr>
    			<tr>
    				<td>Host name:</td>
    				<td><?= php_uname('n') ?></td>
    			</tr>
    			<tr>
    				<td>Login:</td>
    				<td><?= Yii::$app->user->identity->username ?></td>
    			</tr>
    			<tr>
    				<td>Role:</td>
    				<td><?= Yii::$app->user->identity->role ?></td>
    			</tr>
    		</table>
    <?php adminCollapsibleBlock::end(); ?>
	
	 <?php adminCollapsibleBlock::begin([
            'color' => 'blue',
            'btn_type' => 'primary',
            'icon' => 'fa-database',
            'title' => Yii::t('admin', 'Database'),
    ]);?>
            <?= Html::a(\Yii::t('admin','Backup'), Url::to(['backup']), ['class' => 'btn btn-primary']); ?>
	       &nbsp;&nbsp;&nbsp;
	       <?= Html::a(\Yii::t('admin','Restore'), Url::to(['restore']), ['class' => 'btn btn-primary']); ?>
    <?php adminCollapsibleBlock::end(); ?>	
  
   <?= adminCollapsibleBlock::widget([
            'color' => 'yellow',
            'btn_type' => 'warning',
            'icon' => 'fa-map-marker',
            'title' => Yii::t('admin', 'Users management'),
            'body' => Html::a(Yii::t('admin', 'Open User management page'), Url::toRoute('/users/admin') )
    ]) ?>
</div>

