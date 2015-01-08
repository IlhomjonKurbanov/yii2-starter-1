<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => 1024]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>
    <?= $form->field($model, 'body')->widget(\zxbodya\yii2\tinymce\TinyMce::className(),
		[
			'spellcheckerUrl'=>'http://speller.yandex.net/services/tinyspell',
			'language'=> Yii::$app->language,
			'compressorRoute' => 'el-finder/tinyMceCompressor',
			'fileManager' => [
					'class' => \zxbodya\yii2\elfinder\TinyMceElFinder::className(),
					'connectorRoute' => 'el-finder/connector',
			],
		]
	); ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('page', 'Create') : Yii::t('page', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>