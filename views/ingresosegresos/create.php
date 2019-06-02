<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingresosegresos */

$this->title = Yii::t('app', 'Create Ingresosegresos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingresosegresos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingresosegresos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
