<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ViviendasPersonas */

$this->title = Yii::t('app', 'Create Viviendas Personas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Viviendas Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viviendas-personas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
