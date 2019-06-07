<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cedula_identidad') ?>

    <?= $form->field($model, 'nacionalidad') ?>

    <?= $form->field($model, 'primer_apellido') ?>

    <?= $form->field($model, 'segundo_apellido') ?>

    <?php // echo $form->field($model, 'primer_nombre') ?>

    <?php // echo $form->field($model, 'segundo_nombre') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'celular') ?>

    <?php // echo $form->field($model, 'telefono_local') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'viviendas_id') ?>

    <?php // echo $form->field($model, 'responsable_vivienda') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
