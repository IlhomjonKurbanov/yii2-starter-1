<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="article-category-form">

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'slug')->textInput(['maxlength' => 1024]) ?>
<?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>
<?= $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(
        $categories,
        'id',
        'title'
    )) ?>
<?= $form->field($model, 'status')->checkbox() ?>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('article', 'Create') : Yii::t('article', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>