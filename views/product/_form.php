<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;
use app\models\ProductGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idGroup')->dropDownList(
        ArrayHelper::map(
            ProductGroup::find()->all(),
            'idGroup',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Product Group')) ?>
    
    <?= $form->field($model, 'idUnit')->dropDownList(
        ArrayHelper::map(
            Unit::find()->all(),
            'idUnit',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Unit')) ?>

    <?= $form->field($model, 'costWithTaxes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costWithoutTaxes')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'taxFreeProduct')->radioList(
        [
            1 => 'Si',
            0 => 'No',
        ]
    )->label(Yii::t('app', 'Tax Free Product')) ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => true])->label('I.V.A.') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
