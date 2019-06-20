<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pagosvivienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagosvivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'viviendas_id')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_operacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bancoemisor_id')->textInput() ?>

    <?= $form->field($model, 'bancoreceptor_id')->textInput() ?>

    <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_depositante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_depositante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_deposito')->textInput() ?>

    <?= $form->field($model, 'fecha_disponible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
