<?php

namespace app\controllers;

use Yii;
use app\models\Country;
use app\models\countrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;


/**
 * CountryController implements the CRUD actions for country model.
 */
class CountryController extends Controller
{
    /**
     * {@inheritdoc}
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
    public function actionHello() {
        echo "Hello World!";
        exit;
    }

    public function actionOverzicht()
    {
        // dit is de query, dit is te vergelijken met select * from Country
        $countries=Country::find()->all();
      
        // de view wordt aangeroepen en het object $countries en $pagination wordt meegegeven.
        return $this->render('overzicht', [
            'countries' => $countries,
        ]);
    }

    public function actionOverzichtEurope () {
        // dit is de query, dit is te vergelijken met select * from Country
        $countries=Country::find()->where (['Continent' => 'Europe'])->all();
        // de view wordt aangeroepen en het object $countries en $pagination wordt meegegeven.
        return $this->render('overzichteurope', [
            'countries' => $countries,
        ]);
}    

    /**
     * Lists all country models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new countrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single country model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Code]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Code]);
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = country::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
