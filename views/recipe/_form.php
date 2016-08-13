<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\InputGroup;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?php
        if($model->picture != NULL)
            echo "<img style=\"width:10%\" src=\"../uploads/recipe/$model->picture\" class=\"img-responsive\"><p>";
    ?>
    
    <?= $form->field($model, 'file_picture')->fileInput() ?>
    
    <?= $form->field($model, 'idGroup')->dropDownList(
        ArrayHelper::map(
            InputGroup::find()->all(),
            'idGroup',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Input Group')) ?>

    <?= $form->field($model, 'performanceRecipe')->textInput(['maxlength' => true])->label('Recipe Performance') ?>
    
    <?= $form->field($model, 'idUnit')->dropDownList(
        ArrayHelper::map(
            Unit::find()->all(),
            'idUnit',
            'description'
        ), array('prompt' => ""))->label(Yii::t('app', 'Performance Unit')) ?>

    <?= $form->field($model, 'unitCost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'averageCost')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'investable')->radioList(
        [
            1 => 'Sí',
            0 => 'No',
        ]
    )->label(Yii::t('app', 'Investable')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
