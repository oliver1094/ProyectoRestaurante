<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idUnit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idUnit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    
    $unit_name=NULL;
	if(!empty ($model->unitId)){
		$unit_name = $model->unit->description;
	}
    
    ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description',
            'quantity',
            [
                'label' => Yii::t('app', 'Parent Unit'),
                'value' => $unit_name,
            ],
        ],
    ]) ?>

</div>
