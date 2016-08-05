<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\InputGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="input-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idClassification')->dropDownList(
        ArrayHelper::map(
            Classification::find()->all(),
            'idClassification',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Classification')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
