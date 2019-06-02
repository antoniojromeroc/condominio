<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagosviviendaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagosvivienda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'viviendas_id') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'num_operacion') ?>

    <?= $form->field($model, 'bancoemisor_id') ?>

    <?php // echo $form->field($model, 'bancoreceptor_id') ?>

    <?php // echo $form->field($model, 'num_cuenta') ?>

    <?php // echo $form->field($model, 'fecha_deposito') ?>

    <?php // echo $form->field($model, 'fecha_disponible') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
