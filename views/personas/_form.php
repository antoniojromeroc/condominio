<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nacionalidad')
        ->dropDownList([ 'V' => 'Venezolano', 'E' => 'Extranjero'])?>

    <?= $form->field($model, 'cedula_identidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primer_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundo_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')
        ->dropDownList([ 'MASCULINO' => 'Masculino', 'FEMENINO' => 'Femenino'])?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_local')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'viviendas_id')->textInput() ?> 

    <?= $form->field($model, 'responsable_vivienda')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
