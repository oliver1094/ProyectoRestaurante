<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InputGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Input Group',
]) . $model->idGroup;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Input Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idGroup, 'url' => ['view', 'id' => $model->idGroup]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="input-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
