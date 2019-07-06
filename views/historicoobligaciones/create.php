<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Historicoobligaciones */

$this->title = Yii::t('app', 'Create Historicoobligaciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historicoobligaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historicoobligaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
