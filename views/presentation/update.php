<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Presentation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Presentation',
]) . $model->idPresentation;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPresentation, 'url' => ['view', 'id' => $model->idPresentation]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="presentation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
