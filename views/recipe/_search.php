<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPreparedInput') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'performanceRecipe') ?>

    <?= $form->field($model, 'unitCost') ?>

    <?= $form->field($model, 'averageCost') ?>

    <?php // echo $form->field($model, 'investable') ?>

    <?php // echo $form->field($model, 'idGroup') ?>

    <?php // echo $form->field($model, 'idUnit') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
