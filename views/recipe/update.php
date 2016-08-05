<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recipe',
]) . $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPreparedInput, 'url' => ['view', 'id' => $model->idPreparedInput]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
