<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RolOperacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rol-operacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rol_id')->textInput() ?>

    <?= $form->field($model, 'operacion_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
