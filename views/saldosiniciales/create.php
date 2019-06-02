<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saldosiniciales */

$this->title = Yii::t('app', 'Create Saldosiniciales');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Saldosiniciales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saldosiniciales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
