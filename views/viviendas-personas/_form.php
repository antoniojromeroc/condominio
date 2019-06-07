<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViviendasPersonas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viviendas-personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'viviendas_id')->textInput() ?>

    <?= $form->field($model, 'personas_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
