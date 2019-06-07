<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IngresosegresosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ingresosegresos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingresosegresos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="crear-form formulario">
        <?php $form = ActiveForm::begin(['id' => $model->formName()]); ?>

        <div class="container-fluid">
            <div class="row">  
                <div class="row fondocampo" style="width:70%;">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h2><i>Nuevo Periodo</i></h2></div>
                    <div class="col-xs-12 col-sm-8 col-md-2 col-lg-2">
                        <?= $form->field($modelSaldosmensuales, 'anio')->dropDownList($model->getYearsList());?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-3 col-lg-2">
                        <?= $form->field($modelSaldosmensuales, 'mes')
                            ->dropDownList([ '01' => 'ENERO', 
                                 '02' => 'FEBRERO',
                                 '03' => 'MARZO', 
                                 '04' => 'ABRIL',
                                 '05' => 'MAYO', 
                                 '06' => 'JUNIO',
                                 '07' => 'JULIO', 
                                 '08' => 'AGOSTO',
                                 '09' => 'SEPTIEMBRE', 
                                 '10' => 'OCTUBRE',
                                 '11' => 'NOVIEMBRE', 
                                 '12' => 'DICIEMBRE',
                                ])?>
                    </div>                    
                </div>
                <div class="col-xs-12 col-sm-8 col-md-12 col-lg-12"><br ></div>
                <div class="col-xs-7 col-sm-9 col-md-9 col-lg-9"></div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <p>
                        <?= Html::a(Yii::t('app', 'Create Ingresosegresos'), 
                                ['incluir-smensuales'], 
                                ['class' => 'btn btn-success', 
                                 'data' => ['method' => 'post']]) ?>
                    </p>
                </div>
            </div>            
        </div>                  
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-12 col-lg-12"><br></div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'conceptos_id',
            // 'descripcion',
            // 'fecha',
            // 'monto',

            'anio',
            'mes',
            // 'monto_ingresos',
            // 'monto_egresos',
            'saldo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


<?php

$serializar = <<< JS
    // alert('{$model->formName()}');

    $(document).ready(function(){
    //     alert("pasa");
        $('form#{$model->formName()}').submit(function(){
            alert('pasa2');
    //     $("#ISM").submit(function(){
            var cadena = $(this).serialize();
            alert(cadena);
            return false;
        });
    });
JS;
// $this->registerJs($serializar);

?>