<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentavivienda */

$this->title = Yii::t('app', 'Create Cuentavivienda');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuentaviviendas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentavivienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
