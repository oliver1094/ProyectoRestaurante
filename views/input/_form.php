<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Input */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="input-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'averageCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costWithTax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stockable')->textInput() ?>

    <?= $form->field($model, 'wasteRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastCostWaste')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idGroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUnit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
