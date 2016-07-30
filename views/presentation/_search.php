<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresentationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPresentation') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'lastCost') ?>

    <?= $form->field($model, 'averageCost') ?>

    <?= $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'costWithTaxes') ?>

    <?php // echo $form->field($model, 'provider') ?>

    <?php // echo $form->field($model, 'performance') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'minimumStock') ?>

    <?php // echo $form->field($model, 'maximumStock') ?>

    <?php // echo $form->field($model, 'idGroup') ?>

    <?php // echo $form->field($model, 'idInput') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
