<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */

$this->title = $model->recipe->description;
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
            [
                'label' => Yii::t('app', 'Recipe'),
                'value' => $model->recipe->description,
            ],
            [
                'label' => Yii::t('app', 'Input'),
                'value' => $model->input->description,
            ],
            [
                'label' => Yii::t('app', 'Unit'),
                'value' => $model->input->unit->description,
            ],
            'quantity',
        ],
    ]) ?>

</div>
