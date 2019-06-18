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
        $model = new Saldosmensuales();

        if ($model->load(Yii::$app->request->post())) {
            if(Ingresosegresos::existeSaldoInicial($model->anio) == 0){
                Yii::$app->session->setFlash('error', 'Alerta. No se han creado los saldos iniciales para este año. Debe crear primero estos saldos para continuar...'); 
                return $this->redirect(['index']);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['create', 'idSM' => $model->id]);
            return $this->redirect(['index']);
        } else {
            if($model::buscaunico($model,'anio', 'mes',$model->anio, $model->mes)){
                Yii::$app->session->setFlash('error', 'Alerta. El periodo ya existe. Intente con otro rango de año y mes.'); 
            }
            return $this->redirect(['index']);
        }
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
        $model = $this->findModel($id); /*  SALDOS MENSUALES */
        $modelNuevoIE = new Ingresosegresos;

        if ($modelNuevoIE->load(Yii::$app->request->post())) {
            $modelNuevoIE->save();
            /******************/
            /*   
                MOSCA. HACER EL RESPECTIVO PROCEDIMIENTO PARA GUARDAR DATOS EN ESTA TABLA
           */
            // $model->monto_ingresos = 1000;
            // $model->monto_egresos = 100;
            // $model->saldo = 900;
            //$model->save();
            $modelNuevoIE = new Ingresosegresos();
        }

        /*  Corrige posibles cambios en los saldos recorriendo  cada mes del año  */
        $recalcular = Saldosmensuales::recalcular($model->anio);

        $modelIngresosegresos = $this->findIngresosegresos($model->anio, $model->mes);
        //$sInicial['monto'].';'.$sMesAnterior['saldo'].';'.$sMensualIngresos.';'.$sMensualEgresos.';'.$sMensual;
        $montos = Ingresosegresos::calcularSaldos($model->anio, $model->mes);
        $montos = explode(';', $montos);

        // print_r($montos);
        // // print('monto'.$montos[0]);
        //  die();
        $model->saldoInicial = $montos[0];
        $model->saldoMAnterior = $montos[1];
        $model->monto_ingresos = $montos[2];
        $model->monto_egresos = $montos[3];
        $model->saldo = $montos[4];

        return $this->render('update', [
            'model' => $model,
            'modelNuevoIE' => $modelNuevoIE,
            'modelIngresosegresos' => $modelIngresosegresos,
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

    public function actionEliminar($id, $idSM)
    {
        Ingresosegresos::findOne($id)->delete();
        
        // $modelNuevoIE = new Ingresosegresos();
        // $model = $this->findRelacion($idRelacion);
        // $modelSueldosRelacion = $this->findModel($model->id);

        return $this->redirect(['update', 'id' => $idSM]);
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
        //if (($model = Ingresosegresos::findOne($id)) !== null) {
        if (($model = Saldosmensuales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findIngresosegresos($anio, $mes)
    {
        $model = Ingresosegresos::find()->where(['year('.("fecha").')' => $anio, 'month('.("fecha").')' => $mes])->all();
        // print_r($model);
        // return false;
        return $model;
        // if (($model = Ingresosegresos::find()->where(YEAR("fecha") = $anio AND MONTH("fecha") = $mes)->all()) !== null) {
        //     // ->bindValue(':your_date_input1', $your_date_input)
        //     // ->bindValue(':your_date_input2', $your_date_input)
        //     return $model;
        // } else {
        //     throw new NotFoundHttpException('The requested page does not exist.');
        // }
    }
}
