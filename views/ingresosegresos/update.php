<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingresosegresos */

$this->title = Yii::t('app', 'Update Ingresosegresos: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingresosegresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ingresosegresos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelNuevoIE' => $modelNuevoIE,
        'modelIngresosegresos' => $modelIngresosegresos,
    ]) ?>

</div>
