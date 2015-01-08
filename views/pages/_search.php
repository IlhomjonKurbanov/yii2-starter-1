<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="page-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'alias') ?>
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'body') ?>
    <?= $form->field($model, 'status') ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('page', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('page', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>
    
</div>