<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CuentaviviendaPagosvivienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentavivienda-pagosvivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cuentavivienda_id')->textInput() ?>

    <?= $form->field($model, 'pagosvivienda_id')->textInput() ?>

    <?= $form->field($model, 'montopagado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
