<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recipes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recipe'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'description',
            [
                'attribute' => 'performanceRecipe',
                'value' => 'performanceRecipe',
                'label' => Yii::t('app', 'Recipe Performance')
            ],
            'unitCost',
            'averageCost',
            // 'investable',
            // 'idGroup',
            // 'idUnit',
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {assign} {delete}',
                'buttons' => [
                    'assign' => function ($url, $model, $key) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-arrow-down"></span>',
                            ['recipe-has-input/create', 'idRecipe' => $model->idPreparedInput], 
                            [
                                'title' => 'Assign',
                                'aria-label' => Yii::t('yii', 'Assign'),
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
