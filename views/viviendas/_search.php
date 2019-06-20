<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViviendasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viviendas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'calle') ?>

    <?= $form->field($model, 'carrera') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'personas_id') ?>

    <?php // echo $form->field($model, 'codigo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
