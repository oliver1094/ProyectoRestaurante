<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductGroup */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idGroup], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idGroup], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <?php
    
    $classification_name=NULL;
	if(!empty ($model->idClassification)){
		$classification_name = $model->classification->description;
	}
        
    $group_name=NULL;
	if(!empty ($model->groupId)){
		$group_name = $model->group->description;
	}
        
    $requestAutorization = "";
    if ($model->requestAutorization == 0 )
        $requestAutorization = "No";
    else
        $requestAutorization = "Sí";
    
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description',
            [
                'label' => Yii::t('app', 'Classification'),
                'value' => $classification_name,
            ],
            [
                'label' => Yii::t('app', 'Request Autorization'),
                'value' => $requestAutorization,
            ],
            [
                'label' => Yii::t('app', 'Parent Group'),
                'value' => $group_name,
            ],
        ],
    ]) ?>

</div>
