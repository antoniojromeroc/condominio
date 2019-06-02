<?php

namespace app\controllers;

use Yii;
use app\models\Viviendas;
use app\models\ViviendasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Personas;
use app\models\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * ViviendasController implements the CRUD actions for Viviendas model.
 */
class ViviendasController extends Controller
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
     * Lists all Viviendas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ViviendasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Viviendas model.
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
     * Creates a new Viviendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Viviendas();
        $modelsPersonas = [new Personas];

        if ($model->load(Yii::$app->request->post())) { // && $model->save()) {
            $modelsPersonas = Model::createMultiple(Personas::classname());
            Model::loadMultiple($modelsPersonas, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPersonas),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            //$valid = Model::validateMultiple($modelsServicios) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPersonas as $modelPersonas) {
                            $modelPersonas->viviendas_id = $model->id;
                            if (! ($flag = $modelPersonas->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            //return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelsPersonas' => (empty($modelsPersonas)) ? [new Personas] : $modelsPersonas
        ]);

    }

    /**
     * Updates an existing Viviendas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsPersonas = $model->personas;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPersonas, 'id', 'id');
            $modelsPersonas = Model::createMultiple(Personas::classname(), $modelsPersonas);
            Model::loadMultiple($modelsPersonas, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPersonas, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPersonas),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
//            $valid = Model::validateMultiple($modelsServicios) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Personas::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPersonas as $modelPersonas) {
                            $modelPersonas->viviendas_id = $model->id;
                            if (! ($flag = $modelPersonas->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            } else {
                Yii::$app->session->setFlash('error', 'No Paso Validación.');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsPersonas' => (empty($modelsPersonas)) ? [new Personas] : $modelsPersonas
            ]);
        }
    }

    /**
     * Deletes an existing Viviendas model.
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
     * Finds the Viviendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Viviendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Viviendas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
