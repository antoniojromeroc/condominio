<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Cuentavivienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentavivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'viviendas_id')
            ->dropDownList($model->listaViviendas, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
    <?= $form->field($model, 'tipoobligaciones_id')
            ->dropDownList($model->listaTipoObligaciones, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mes')
            ->dropDownList([ '01' => 'ENERO', 
                             '02' => 'FEBRERO',
                             '03' => 'MARZO', 
                             '04' => 'ABRIL',
                             '05' => 'MAYO', 
                             '06' => 'JUNIO',
                             '07' => 'JULIO', 
                             '08' => 'AGOSTO',
                             '09' => 'SEPTIEMBRE', 
                             '10' => 'OCTUBRE',
                             '11' => 'NOVIEMBRE', 
                             '12' => 'DICIEMBRE',
                            ])?>

    <?= $form->field($model, 'anio')->dropDownList($model->getYearsList());?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_vencimiento')
            ->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'clientOptions' => [
                                        // 'minDate' => '+1m +1w',
                                        // 'maxDate'=> '+1m',                                        
                                        //'defaultDate'=>'-60',
                                        // 'numberOfMonths' => 2,
                                        //'yearRange' => '-115:+0',
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                    ],
                                    'options' => ['class' => 'form-control', 'style' => 'width:100%','readonly' => 'readonly'] 
                                ]) ?>

    <?= $form->field($model, 'monto_faltante')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
