<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Input;
use app\models\InputGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Presentation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idGroup')->dropDownList(
        ArrayHelper::map(
            InputGroup::find()->all(),
            'idGroup',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Group')) ?>
    
    <?= $form->field($model, 'idInput')->dropDownList(
        ArrayHelper::map(
            Input::find()->all(),
            'idInput',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Input')) ?>

    <?= $form->field($model, 'lastCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'averageCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iva')->textInput(['maxlength' => true])->label('I.V.A.') ?>

    <?= $form->field($model, 'costWithTaxes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'performance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minimumStock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maximumStock')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
