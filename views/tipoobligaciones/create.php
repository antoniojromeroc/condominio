<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoobligaciones */

$this->title = Yii::t('app', 'Create Tipoobligaciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipoobligaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoobligaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
