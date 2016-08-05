<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php
    
    $requestAutorization = "";
	/*if($model->requestAutorization == 0)
		$requestAutorization = "No";
    else
        $requestAutorization = "Sí";
	*/
    
    ?>
    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'description',
            //'requestAutorization',
            [
                'attribute' => 'idClassification',
                'value' => 'classification.description',
                'label' => Yii::t('app', 'Classification')
            ],
            [
                'attribute' => 'groupId',
                'value' => 'group.description',
                'label' => Yii::t('app', 'Parent Group')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
