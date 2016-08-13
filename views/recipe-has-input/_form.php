<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Recipe;
use app\models\Input;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-has-input-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idPreparedInput')->dropDownList(
        ArrayHelper::map(
            Recipe::find()->all(),
            'idPreparedInput',
            'description'
        ), array('prompt' => "", 'disabled' => "true"))->label(Yii::t('app', 'Recipe')) ?>
    
    <?= $form->field($model, 'idInput')->dropDownList(
        ArrayHelper::map(
            Input::find()->all(),
            'idInput',
            'description'
        ), array(
            'prompt' => ""))->label(Yii::t('app', 'Input')) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
