<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Conceptos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conceptos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tipo')->dropDownList([ 'INGRESO' => 'INGRESO', 'EGRESO' => 'EGRESO', ], ['prompt' => '']) ?> -->

    <?= $form->field($model, 'tipo')->dropDownList([ 'INGRESO' => 'INGRESO', 'EGRESO' => 'EGRESO', ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
