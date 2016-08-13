<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecipeHasInput */

$this->title = Yii::t('app', 'Assign Input to Recipe: '.$model->recipe->description);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recipe'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-has-input-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
