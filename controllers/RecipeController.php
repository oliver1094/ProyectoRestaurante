<?php

namespace app\controllers;

use Yii;
use app\models\Recipe;
use app\models\RecipeSearch;
use app\models\RecipeHasInput;
use app\models\RecipeHasInputSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends Controller
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
     * Lists all Recipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipe model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $queryParams["RecipeHasInputSearch"]["idPreparedInput"] = $id;
        $searchModel = new RecipeHasInputSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $recipeHasInputModel = new RecipeHasInput();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'recipe_sInputs' => $recipeHasInputModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipe(['scenario'=>'Create']);
        
        if ($model->load(Yii::$app->request->post())) {
            $model->file_picture = UploadedFile::getInstance($model,'file_picture');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->idPreparedInput]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model,'file_picture')!=NULL)
                $model->file_picture = UploadedFile::getInstance($model,'file_picture');
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->idPreparedInput]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
