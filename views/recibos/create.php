<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recibos */

$this->title = Yii::t('app', 'Create Recibos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recibos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recibos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
