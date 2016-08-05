<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Input */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inputs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idInput], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idInput], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?php
    
    $group_name=NULL;
	if(!empty ($model->idGroup)){
		$group_name = $model->group->description;
	}
    
    $unit_name=NULL;
	if(!empty ($model->idUnit)){
		$unit_name = $model->unit->description;
	}
    
    $stockable = "";
    if ($model->stockable ==0 )
        $stockable = "No";
    else
        $stockable = "Sí";
    
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description',
            [
                'label' => Yii::t('app', 'Input Group'),
                'value' => $group_name,
            ],
            [
                'label' => Yii::t('app', 'Unit'),
                'value' => $unit_name,
            ],
            'lastCost',
            'averageCost',
            [
                'label' => Yii::t('app', 'I.V.A.'),
                'value' => $model->iva,
            ],
            'costWithTax',
            [
                'label' => Yii::t('app', 'Stockable'),
                'value' => $stockable,
            ],
            'wasteRate',
            'lastCostWaste',
        ],
    ]) ?>

</div>
