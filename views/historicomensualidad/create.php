<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Historicomensualidad */

$this->title = Yii::t('app', 'Create Historicomensualidad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historicomensualidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historicomensualidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
