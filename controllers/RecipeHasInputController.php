<?php

namespace app\controllers;

use Yii;
use app\models\RecipeHasInput;
use app\models\RecipeHasInputSearch;
use app\models\Input;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecipeHasInputController implements the CRUD actions for RecipeHasInput model.
 */
class RecipeHasInputController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all RecipeHasInput models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipeHasInputSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecipeHasInput model.
     * @param string $idPreparedInput
     * @param string $idInput
     * @return mixed
     */
    public function actionView($idPreparedInput, $idInput)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPreparedInput, $idInput),
        ]);
    }

    /**
     * Creates a new RecipeHasInput model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RecipeHasInput();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPreparedInput' => $model->idPreparedInput, 'idInput' => $model->idInput]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RecipeHasInput model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idPreparedInput
     * @param string $idInput
     * @return mixed
     */
    public function actionUpdate($idPreparedInput, $idInput)
    {
        $model = $this->findModel($idPreparedInput, $idInput);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPreparedInput' => $model->idPreparedInput, 'idInput' => $model->idInput]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RecipeHasInput model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idPreparedInput
     * @param string $idInput
     * @return mixed
     */
    public function actionDelete($idPreparedInput, $idInput)
    {
        $this->findModel($idPreparedInput, $idInput)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RecipeHasInput model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idPreparedInput
     * @param string $idInput
     * @return RecipeHasInput the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPreparedInput, $idInput)
    {
        if (($model = RecipeHasInput::findOne(['idPreparedInput' => $idPreparedInput, 'idInput' => $idInput])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
