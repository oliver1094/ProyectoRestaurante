<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idPreparedInput], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idPreparedInput], [
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
        
    $investable = "";
    if($model->investable == 0)
        $investable = "No";
    else
        $investable = "Sí";
    
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
                'label' => Yii::t('app', 'Recipe Performance'),
                'value' => 'performanceRecipe',
            ],
            [
                'label' => Yii::t('app', 'Performance Unit'),
                'value' => $unit_name,
            ],
            'unitCost',
            'averageCost',
            [
                'label' => Yii::t('app', 'Investable'),
                'value' => $investable,
            ],
        ],
    ]) ?>

</div>
