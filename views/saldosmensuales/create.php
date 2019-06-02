<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saldosmensuales */

$this->title = Yii::t('app', 'Create Saldosmensuales');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saldosmensuales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldosmensuales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
