<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Recipe */
/* @var $recipe_sInputs app\models\RecipeHasInput */

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
        if($model->picture != NULL)
            echo "<center><a href=\"../uploads/recipe/$model->picture\"><img style=\"width:30%\" src=\"../uploads/recipe/$model->picture\" class=\"img-responsive\"></a></center><p>";
    ?>
    
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
                'value' => $model->performanceRecipe,
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
    
    <h2>Inputs:</h2>
    <p>
        <?= Html::a(Yii::t('app', 'Assign Input'), ['./recipe-has-input/create', 'idRecipe' => $model->idPreparedInput], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'idInput',
                'value' => 'input.description',
                'label' => Yii::t('app', 'Input')
            ],
            'quantity',
            [
                'attribute' => 'idUnit',
                'value' => 'input.unit.description',
                'label' => Yii::t('app', 'Input')
            ],
            //['class' => 'yii\grid\ActionColumn']
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $recipe_sInputs, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            ['recipe-has-input/update', 'idPreparedInput' => $recipe_sInputs->idPreparedInput, 'idInput' => $recipe_sInputs->idInput], 
                            [
                                'title' => 'Update',
                                'aria-label' => Yii::t('yii', 'Update'),
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'delete' => function ($url, $recipe_sInputs, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            ['recipe-has-input/delete', 'idPreparedInput' => $recipe_sInputs->idPreparedInput, 'idInput' => $recipe_sInputs->idInput], 
                            [
                                'title' => Yii::t('yii', 'Delete'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>

</div>
