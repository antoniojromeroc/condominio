<?php

namespace app\controllers;

use Yii;
use app\models\Pagosvivienda;
use app\models\PagosviviendaSearch;
use app\models\Cuentavivienda;
use app\models\CuentaviviendaPagosvivienda;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagosviviendaController implements the CRUD actions for Pagosvivienda model.
 */
class PagosviviendaController extends Controller
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
     * Lists all Pagosvivienda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagosviviendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagosvivienda model.
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
     * Creates a new Pagosvivienda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagosvivienda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pagosvivienda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCuentav = Cuentavivienda::find()
            ->where(['viviendas_id' => $model->viviendas_id])
//            ->andwhere(['cerrada' => 0])
            ->all();
        $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelCuentav' => $modelCuentav,
            'modelCuentavPagosv' => $modelCuentavPagosv,
        ]);
    }

    public function actionActualizar($id)
    {
        $recibido = [];
        $idObligacion=0;
        $relacionar=0;
        $montodeoperacion=0;
        //$montopagado=0;
        $montofaltante=0;
        $montoaporte=0;
        $model = $this->findModel($id);
        $modelCuentav = Cuentavivienda::find()
            ->where(['viviendas_id' => $model->viviendas_id])
//            ->andwhere(['cerrada' => 0])
            ->all();
        $modelCuentavPagosvNuevo = new CuentaviviendaPagosvivienda();

        if(Yii::$app->request->post()) {
            //$enviado = Yii::$app->request->post('Cuentavivienda');
            $recibido = Yii::$app->request->post('Cuentavivienda');
            $t_items = sizeof($recibido);
            $t_items = $t_items - 1;
            $contador = 0;
            // print_r($enviado);
            // var_dump($t_items);
            // print($t_items);
            // die();
            $Pagosvivienda_ = Yii::$app->request->post('Pagosvivienda');
            //while ($idObligacion < $t_items)
            while ($contador < $t_items)
            {
            //foreach ($enviado as $recibido) {
//                $idObligacion++;
                $contador++;
                $montopagagadoAnt = 0;
                # code...
//                $idObligacion=$recibido['Cuentavivienda'][$contador][$idObligacion]; 
                $idObligacion=$recibido[$contador]['idObligacion']; 
//                 print_r($recibido);
//                 die();
                //$relacionar=$recibido['Cuentavivienda'][$idObligacion]['relacionar']; 
                $relacionar=$recibido[$contador][$idObligacion]['relacionar']; 
                $modelCuentavPagosvUnico = CuentaviviendaPagosvivienda::find()->
                        where([
                            'cuentavivienda_id' => $idObligacion,
                            'pagosvivienda_id' => $model->id
                        ])->one();
                if($relacionar)
                {
                    // $montooperacion >> Se refiere al monto pagado en la operacion bancaria registrada en este id de Pagosvivienda
                    $montodeoperacion=$Pagosvivienda_[$contador][$idObligacion]['monto']; 
                    // $montopagado >> Corresponde a la suma de todos las pagos relacionados con esta obligacion
                    // $montofaltante >> Lo que falta para completar la obligacion
                    //$montofaltante=$recibido['Cuentavivienda'][$idObligacion]['montofaltante'];
                    $montofaltante=$recibido[$contador][$idObligacion]['montofaltante'];
                    // $montoaporte >> Lo que indique que va a abonar o aportar a la obligacion
                    //$montoaporte=$recibido['Cuentavivienda'][$idObligacion]['montoapagar'];
                    $montoaporte=$recibido[$contador][$idObligacion]['montoapagar'];
                    // $montorestante >> Cantidad de dinero que queda de la operación bancaria
                    if($modelCuentavPagosvUnico)
                    {
                        $montopagagadoAnt = $modelCuentavPagosvUnico->montopagado;
                        $montorestante=$recibido[$contador][$t_items]['montorestante'] 
                                + $modelCuentavPagosvUnico->montopagado;
                    } else {
                        $montorestante=$recibido[$contador][$t_items]['montorestante'];
                    }
//                    print('aporte:'.$montoaporte);
//                    print('Restante que viene:'.$recibido[$t_items]['montorestante']);
//                    print('Restante:'.$montorestante);
//                    print('Pagado'.$modelCuentavPagosvUnico->montopagado);
//                    die();
                    if($montoaporte <= 0){
                        Yii::$app->session->setFlash('error', 'Alerta. El monto a abonar no puede ser Cero (0) o inferior...'); 
                        $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();
                        return $this->render('update', [
                                'model' => $model,
                                'modelCuentav' => $modelCuentav,
                                'modelCuentavPagosv' => $modelCuentavPagosv,
                            ]);
                    }
                    if($montoaporte > $montodeoperacion){
                        Yii::$app->session->setFlash('error', 'Alerta. El monto a abonar no puede superar el monto del Depósito...'); 
                        $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();
                        return $this->render('update', [
                                'model' => $model,
                                'modelCuentav' => $modelCuentav,
                                'modelCuentavPagosv' => $modelCuentavPagosv,
                            ]);
                    }
                    $montofaltante = $montofaltante + $montopagagadoAnt;
                    if($montoaporte > $montofaltante){
                        Yii::$app->session->setFlash('error', 'Alerta. El monto a abonar no puede superar el monto faltante de la Obligacion...'); 
                        $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();
                        return $this->render('update', [
                                'model' => $model,
                                'modelCuentav' => $modelCuentav,
                                'modelCuentavPagosv' => $modelCuentavPagosv,
                            ]);
                    }
                    if($montoaporte > $montorestante){
                        Yii::$app->session->setFlash('error', 'Alerta. El monto a abonar no puede superar el monto restante del Depósito...'); 
                        $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();
                        return $this->render('update', [
                                'model' => $model,
                                'modelCuentav' => $modelCuentav,
                                'modelCuentavPagosv' => $modelCuentavPagosv,
                            ]);
                    }
                    if($modelCuentavPagosvUnico)
                    {
                        $modelCuentavPagosvUnico->montopagado = $montoaporte;
                        if($modelCuentavPagosvUnico->save())
                        {
                            if($montoaporte == $montofaltante)
                            {
                                $modelCuentavA = Cuentavivienda::find()->where(['id' => $modelCuentavPagosvUnico->cuentavivienda_id])->one();
                                $modelCuentavA->cerrada = 1;
                                $modelCuentavA->save();
                            } else {
                                if($montoaporte < $montopagagadoAnt)
                                {
                                    $modelCuentavA = Cuentavivienda::find()->where(['id' => $modelCuentavPagosvUnico->cuentavivienda_id])->one();
                                    $modelCuentavA->cerrada = 0;
                                    $modelCuentavA->save();
                                    Yii::$app->session->setFlash('warning', 'Advertencia. Con esta acción cambio estatus de Cerrado a Abierto para la cuenta... Item: '.$contador);
                                }
                            }
                            Yii::$app->session->setFlash('success', 'Exito. Ha actualizado el monto exitosamente en el Item: '.$contador);
                        } else
                        {
                            Yii::$app->session->setFlash('warning', 'Advertencia. No se guardaron cambios en la BD... Item: '.$contador);
                        }
                    } else 
                    {
                        $modelCuentavPagosvNuevo->cuentavivienda_id = $idObligacion;
                        $modelCuentavPagosvNuevo->pagosvivienda_id = $id;
                        $modelCuentavPagosvNuevo->montopagado = $montoaporte;
                        if($modelCuentavPagosvNuevo->save())
                        {
                            if($montoaporte == $montofaltante)
                            {
                                $modelCuentavA = Cuentavivienda::find()->where(['id' => $modelCuentavPagosvNuevo->cuentavivienda_id])->one();
                                $modelCuentavA->cerrada = 1;
                                $modelCuentavA->save();
                            }
                            Yii::$app->session->setFlash('success', 'Exito. Ha relacionado exitosamente el pago de la Obligación Item: '. $contador);
                        } else
                        {
                            Yii::$app->session->setFlash('warning', 'Advertencia. No se guardaron cambios en la BD... Item: '.$contador);
                        }
                    }                    
                } else
                {
                    if($modelCuentavPagosvUnico){
                        $modelCuentavA = Cuentavivienda::find()->where(['id' => $modelCuentavPagosvUnico->cuentavivienda_id])->one();
                        $modelCuentavA->cerrada = 0;
                        $modelCuentavA->save();
                        $modelCuentavPagosvUnico->delete();                        
                        Yii::$app->session->setFlash('success', 'Exito. Ha desvinculado exitosamente este pago con la Obligación desmarcada...');   
                    } else
                    {
                        Yii::$app->session->setFlash('warning', 'Advertencia. No guardo datos en este Item: '.$contador.' No tildo en recuadro..');
                    }
                }   
            }
            $modelCuentavPagosv = CuentaviviendaPagosvivienda::find()->where(['pagosvivienda_id' => $model->id])->all();
            return $this->render('update', [
                    'model' => $model,
                    'modelCuentav' => $modelCuentav,
                    'modelCuentavPagosv' => $modelCuentavPagosv,
            ]);          
        } 
    }

    /**
     * Deletes an existing Pagosvivienda model.
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
     * Finds the Pagosvivienda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagosvivienda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagosvivienda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
