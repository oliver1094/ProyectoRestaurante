<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idProduct') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'costWithTaxes') ?>

    <?= $form->field($model, 'costWithoutTaxes') ?>

    <?= $form->field($model, 'taxFreeProduct') ?>

    <?php // echo $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'idGroup') ?>

    <?php // echo $form->field($model, 'idUnit') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
