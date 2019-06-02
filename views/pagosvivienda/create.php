<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagosvivienda */

$this->title = Yii::t('app', 'Create Pagosvivienda');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagosviviendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagosvivienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
