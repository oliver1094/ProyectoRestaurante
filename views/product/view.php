<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idProduct], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idProduct], [
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
        
    $taxFreeProduct = "";
    if ($model->taxFreeProduct ==0 )
        $taxFreeProduct = "No";
    else
        $taxFreeProduct = "Sí";
    
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description',
            [
                'label' => Yii::t('app', 'Group'),
                'value' => $group_name,
            ],
            [
                'label' => Yii::t('app', 'Unit'),
                'value' => $unit_name,
            ],
            'costWithTaxes',
            'costWithoutTaxes',
            [
                'label' => Yii::t('app', 'Tax Free Product'),
                'value' => $taxFreeProduct,
            ],
            [
                'label' => Yii::t('app', 'I.V.A.'),
                'value' => $model->iva,
            ],
        ],
    ]) ?>

</div>
