<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */

$this->title = $model->idPreparedInput;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipe Has Inputs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-has-input-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idPreparedInput' => $model->idPreparedInput, 'idInput' => $model->idInput], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idPreparedInput' => $model->idPreparedInput, 'idInput' => $model->idInput], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPreparedInput',
            'idInput',
            'quantity',
        ],
    ]) ?>

</div>
