<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RolOperacion */

$this->title = Yii::t('app', 'Update Rol Operacion: {name}', [
    'name' => $model->rol_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rol Operacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rol_id, 'url' => ['view', 'rol_id' => $model->rol_id, 'operacion_id' => $model->operacion_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rol-operacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
