<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classification */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Classification',
]) . $model->idClassification;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idClassification, 'url' => ['view', 'id' => $model->idClassification]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="classification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>