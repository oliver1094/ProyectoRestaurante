<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Presentation */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presentations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idPresentation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idPresentation], [
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
    
    $input_name=NULL;
	if(!empty ($model->idInput)){
		$input_name = $model->input->description;
	}
    
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
                'label' => Yii::t('app', 'Input'),
                'value' => $input_name,
            ],
            'lastCost',
            'averageCost',
            [
                'label' => Yii::t('app', 'I.V.A.'),
                'value' => $model->iva,
            ],
            'costWithTaxes',
            'provider',
            'performance',
            'status',
            'location',
            'minimumStock',
            'maximumStock',
        ],
    ]) ?>

</div>
