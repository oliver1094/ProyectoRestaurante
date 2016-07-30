<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InputSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="input-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInput') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'lastCost') ?>

    <?= $form->field($model, 'averageCost') ?>

    <?= $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'costWithTax') ?>

    <?php // echo $form->field($model, 'stockable') ?>

    <?php // echo $form->field($model, 'wasteRate') ?>

    <?php // echo $form->field($model, 'lastCostWaste') ?>

    <?php // echo $form->field($model, 'idGroup') ?>

    <?php // echo $form->field($model, 'idUnit') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
