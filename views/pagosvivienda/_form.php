<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pagosvivienda */
/* @var $form yii\widgets\ActiveForm */

$colorFondo = "#BCBFD1"; //#ABB2E2"; //"#CFD8FF";
$colorCampos = "#E7E6EE";

?>

<div class="pagosvivienda-form formulario">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <div class="row">  
            <div class="row fondocampo" style="width:70%;">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
                    Datos del Depósito
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                    <?= $form->field($model, 'viviendas_id')
                        ->dropDownList($model->listaViviendas, 
                            ['prompt' => 'Seleccione Uno', 
                             'style'=>'width:100%'
                            ]                 
                         );?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Bancos</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'bancoemisor_id')
                            ->dropDownList($model->listaBancos, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'bancoreceptor_id')
                            ->dropDownList($model->listaBancos, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Datos del Depósito</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'num_operacion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>
                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'nombre_depositante')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'cedula_depositante')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Fechas</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'fecha_deposito')
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
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'fecha_disponible')
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
                <div class="col-md-12"><br></div>
            <!-- <div class="container-fluid">
                <div class="form-group"> -->
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                </div>
            <!--     </div> -->
                <?php ActiveForm::end(); ?>
            <!-- </div> -->
                <div class="col-md-12"><br></div>
            </div>
            <div class="col-md-12"><br></div>
        </div>
    </div>
</div>
