<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Classification;
use app\models\ProductGroup;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'idClassification')->dropDownList(
        ArrayHelper::map(
            Classification::find()->all(),
            'idClassification',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Classification')) ?>
    
    <?= $form->field($model, 'requestAutorization')->radioList(
        [
            1 => 'Sí',
            0 => 'No',
        ]
    )->label(Yii::t('app', 'Request Autorization')) ?>
    
    <?= $form->field($model, 'groupId')->dropDownList(
        ArrayHelper::map(
            ProductGroup::find()->all(),
            'groupId',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Group')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
