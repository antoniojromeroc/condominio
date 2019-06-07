<?php

namespace app\controllers;

use Yii;
use app\models\Ingresosegresos;
use app\models\IngresosegresosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Saldosmensuales;
use app\models\SaldosmensualesSearch;

/**
 * IngresosegresosController implements the CRUD actions for Ingresosegresos model.
 */
class IngresosegresosController extends Controller
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

    /**
     * Lists all Ingresosegresos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaldosmensualesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new Ingresosegresos();
        $modelSaldosmensuales = new Saldosmensuales();

        // $searchModel = new IngresosegresosSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'modelSaldosmensuales' => $modelSaldosmensuales,
        ]);
    }

    /**
     * Displays a single Ingresosegresos model.
     * @param integer $id
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
     * Creates a new Ingresosegresos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSM)
    {
        $model = new Ingresosegresos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'idSM' => $idSM,
        ]);
    }

    /**
     * Incluir un registro en el modelo Saldos Mensuales.
     * 
     * 
     */
    public function actionIncluirSmensuales()
    {
        // return true;

        // print_r(Yii::$app->request->post());
        // // Yii::$app->session->setFlash('error', 'Alerta. Entrando en la accion Incluir Saldos Mensuales'.Yii::$app->request->post()); 
        // return false;
        $model = new Saldosmensuales();

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['create', 'idSM' => $model->id]);
        }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Updates an existing Ingresosegresos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ingresosegresos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ingresosegresos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ingresosegresos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ingresosegresos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
