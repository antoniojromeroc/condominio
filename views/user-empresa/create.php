<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserEmpresa */

$this->title = Yii::t('app', 'Create User Empresa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Empresas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-empresa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
