<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu"><a href="#" class="dropdown-toggle"
	data-toggle="dropdown"> <i class="glyphicon glyphicon-user"></i> <span><?= @Yii::$app->user->identity->username ?> <i class="caret"></i>
	</span>
</a>
	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header bg-light-blue">
			<?php $user = dektrium\user\models\User::findOne(['id' => \Yii::$app->getUser()->getId()]); ?>
			<img src="http://gravatar.com/avatar/<?= $avatar ?>?s=230" alt="User Image" class="img-circle" />
			<p><?= @Yii::$app->user->identity->username ?> <small>Member since <?= date('M. Y', $user->created_at) ?></small></p>
		</li>
		<!-- Menu Body -->
		<li class="user-body">
			<div class="col-xs-4 text-center">
				<a href="<?= \yii\helpers\Url::to('@web/users/settings/profile') ?>">Settings</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="<?= \yii\helpers\Url::to('@web/users/settings/account') ?>">Account</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="<?= \yii\helpers\Url::to('@web/users/settings/networks') ?>">Networks</a>
			</div>
		</li>
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
				<a href="<?= \yii\helpers\Url::to('@web/users/profile') ?>" class="btn btn-default btn-flat">
				    <?= Yii::t('admin', 'Profile') ?>
				</a>
			</div>
			<div class="pull-right">
			     <?= \yii\helpers\Html::a(
			         Yii::t('admin', 'Sign out'), 
			         '@web/user/logout', 
                    ['data-method' => 'post', 'class'=>"btn btn-default btn-flat"]); 
			     ?>
			</div>
		</li>
	</ul></li>