<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="article-category-search">

<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<?= $form->field($model, 'id') ?>
<?= $form->field($model, 'slug') ?>
<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'status') ?>

<div class="form-group">
<?= Html::submitButton(Yii::t('article', 'Search'), ['class' => 'btn btn-primary']) ?>
<?= Html::resetButton(Yii::t('article', 'Reset'), ['class' => 'btn btn-default']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>