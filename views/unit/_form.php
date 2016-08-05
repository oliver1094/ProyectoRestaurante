<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'unitId')->dropDownList(
        ArrayHelper::map(
            Unit::find()->all(),
            'idUnit',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Parent Unit')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
