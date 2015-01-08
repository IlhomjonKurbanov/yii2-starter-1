<?php
use yii\widgets\ActiveForm;
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'file')->fileInput() ?>
<button><?= \Yii::t('admin','Submit'); ?></button>
<?php ActiveForm::end(); ?>