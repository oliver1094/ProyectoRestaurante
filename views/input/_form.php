<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;
use app\models\InputGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Input */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="input-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idGroup')->dropDownList(
        ArrayHelper::map(
            InputGroup::find()->all(),
            'idGroup',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Input Group')) ?>
    
    <?= $form->field($model, 'idUnit')->dropDownList(
        ArrayHelper::map(
            Unit::find()->all(),
            'idUnit',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Unit')) ?>

    <?= $form->field($model, 'lastCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'averageCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => true])->label('I.V.A.') ?>

    <?= $form->field($model, 'costWithTax')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'stockable')->radioList(
        [
            1 => 'Si',
            0 => 'No',
        ]
    )->label(Yii::t('app', 'Stockable')) ?>

    <?= $form->field($model, 'wasteRate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastCostWaste')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
