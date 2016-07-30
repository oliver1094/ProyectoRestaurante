<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recipe Has Input',
]) . $model->idPreparedInput;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipe Has Inputs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPreparedInput, 'url' => ['view', 'idPreparedInput' => $model->idPreparedInput, 'idInput' => $model->idInput]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recipe-has-input-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
