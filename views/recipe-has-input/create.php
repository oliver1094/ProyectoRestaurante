<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */

$this->title = Yii::t('app', 'Create Recipe Has Input');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipe Has Inputs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-has-input-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
