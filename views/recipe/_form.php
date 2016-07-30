<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'performanceRecipe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unitCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'averageCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'investable')->textInput() ?>

    <?= $form->field($model, 'idGroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUnit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
