<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Miembrosdirectiva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="miembrosdirectiva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'directiva_id')->textInput() ?>

    <?= $form->field($model, 'miembros_id')->textInput() ?>

    <?= $form->field($model, 'cargos_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
