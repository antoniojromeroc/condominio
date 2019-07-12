<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Historicoobligaciones */
/* @var $form yii\widgets\ActiveForm */

$colorFondo = "#BCBFD1"; //#ABB2E2"; //"#CFD8FF";
$colorCampos = "#E7E6EE";
?>

<div class="historicoobligaciones-form formulario">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <div class="row">  
            <div class="row fondocampo" style="width:70%;">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
                    Historico de Obligaciones
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                	<?= $form->field($model, 'tipoobligaciones_id')
                            ->dropDownList($model->listaTipoObligaciones, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>				    
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-4">
    				<?= $form->field($model, 'fecha')
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
                <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div> -->
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-4">
    				<?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
    			</div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br><br></div>
    </div>
</div>
