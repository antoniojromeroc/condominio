<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CuentaviviendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cuentaviviendas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentavivienda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cuentavivienda'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'viviendas_id',
                'value' => 'viviendas.numero',
            ],
            [
                'attribute' => 'tipoobligaciones_id',
                'value' => 'tipoobligaciones.descripcion'
            ],
            
            'descripcion',
            'mes',
            'cerrada',
            //'anio',
            //'monto',
            //'fecha_vencimiento',
            //'monto_faltante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
