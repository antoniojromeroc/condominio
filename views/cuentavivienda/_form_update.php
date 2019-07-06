<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Cuentavivienda */
/* @var $form yii\widgets\ActiveForm */

$colorFondo = "#BCBFD1"; //#ABB2E2"; //"#CFD8FF";
$colorCampos = "#E7E6EE";

?>

<div class="cuentavivienda-form formulario">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'id')->textInput() ?>
    
    <div class="container-fluid">
        <div class="row">  
            <div class="row fondocampo" style="width:70%;">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
                    Obligación
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                    <?= $form->field($model, 'viviendas_id')
                            ->dropDownList($model->listaViviendas, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                 </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Bancos</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-4">
                    <?= $form->field($model, 'tipoobligaciones_id')
                            ->dropDownList($model->listaTipoObligaciones, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                 </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-6">
                    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
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
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    <?= $form->field($model, 'anio')->dropDownList($model->getYearsList());?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
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
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
                    <?= $form->field($model, 'monto_faltante')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                <?= $form->field($model, 'cerrada')->checkbox() ?>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-4 bg-primary" style="font-size: 18px">
                    <center>Banco</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2 bg-primary" style="font-size: 18px">
                    <center># Operación</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-4 bg-primary" style="font-size: 18px">
                    <center>Monto</center>
                </div>
                <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8"> -->
<!--                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>-->
                    <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div> -->
                <?php 
                    foreach($model->cuentaviviendaPagosviviendas as $vinculacion)
                    {
                        echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>';
                        echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>';
                        echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-4" style="font-size: 12px">';
                        echo '<center>'.$vinculacion->pagosvivienda->bancoreceptor->nombre.'</center>';
                        echo '</div><div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-size: 18px">';
                        echo '<center>'.$vinculacion->pagosvivienda->num_operacion.'</center>';
                        echo '</div><div class="col-xs-12 col-sm-8 col-md-9 col-lg-4" style="font-size: 18px">';
                        echo '<center>'.$vinculacion->montopagado.'</center>';
                        echo '</div>';
                    }

                ?>
                
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    <div class="form-group">
                        <?php
                        if($model->cerrada == 0){ ?>
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br><br></div>
    </div>
</div>