<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pagosvivienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagosvivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'viviendas_id')
            ->dropDownList($model->listaViviendas, 
                ['prompt' => 'Seleccione Uno', 
                 'style'=>'width:100%',
                 "onchange"=>"Obligaciones();"
                ]                 
             );?>
    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_operacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bancoemisor_id')
            ->dropDownList($model->listaBancos, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>

    <?= $form->field($model, 'bancoreceptor_id')
            ->dropDownList($model->listaBancos, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>

    <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_depositante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_depositante')->textInput(['maxlength' => true]) ?>

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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
