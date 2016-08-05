<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InputSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Inputs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Input'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'description',
            'lastCost',
            'averageCost',
            [
                'attribute' => 'iva',
                'value' => 'iva',
                'label' => Yii::t('app', 'I.V.A.')
            ],
            // 'costWithTax',
            // 'stockable',
            // 'wasteRate',
            // 'lastCostWaste',
            // 'idGroup',
            // 'idUnit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
