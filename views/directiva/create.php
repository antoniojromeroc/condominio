<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Directiva */

$this->title = Yii::t('app', 'Create Directiva');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Directivas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directiva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
