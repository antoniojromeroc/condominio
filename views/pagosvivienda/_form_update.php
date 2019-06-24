<?php
 // $script = <<< JS

 //    $('#el').on('click', 
 //        function(e) 
 //        { 
 //            $.ajax({ 
 //                url: '/path/to/action', 
 //                data: 
 //                {
 //                    id: '', 
 //                    'other': ''
 //                }, 
 //                success: function(data) 
 //                { // process data 
 //                } 
 //            }); 
 //        }
 //    ); 
        
 //    JS; 

 //    $this->registerJs($script); //, $position); 
        // where $position can be View::POS_READY (the default), 
        // or View::POS_HEAD, View::POS_BEGIN, View::POS_END 

        // $.get( "' . Url::toRoute('controller/action') . '", 
        //     { 
        //         item: $("#idoffield").val()
        //     } ) 
        //      to send the parameter to controller 
        //     .done(function( data ) 
        //         { 
        //             $( "#lists" ).html( data ); 
        //         });
?>

<script>
 
    function actualizar(){
        //alert('entra');
        $("#relacion").submit();
    }

</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\CuentaviviendaPagosvivienda;


/* @var $this yii\web\View */
/* @var $model app\models\Pagosvivienda */
/* @var $form yii\widgets\ActiveForm */

$colorFondo = "#BCBFD1"; //#ABB2E2"; //"#CFD8FF";
$colorCampos = "#E7E6EE";

?>

<div class="pagosvivienda-form formulario">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'viviendas_id')
            ->dropDownList($model->listaViviendas, 
                ['prompt' => 'Seleccione Uno', 
                 'style'=>'width:100%',
                 "onchange"=>"Obligaciones();"
                ]                 
             );?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_operacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bancoemisor_id')
            ->dropDownList($model->listaBancos, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>

    <?= $form->field($model, 'bancoreceptor_id')
            ->dropDownList($model->listaBancos, 
                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>

    <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_depositante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_depositante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_deposito')
            ->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'clientOptions' => [
                                        // 'minDate' => '+1m +1w',
                                        // 'maxDate'=> '+1m',                                        
                                        //'defaultDate'=>'-60',
                                        // 'numberOfMonths' => 2,
                                        //'yearRange' => '-115:+0',
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                    ],
                                    'options' => ['class' => 'form-control', 'style' => 'width:100%','readonly' => 'readonly'] 
                                ]) ?>

    <?= $form->field($model, 'fecha_disponible')
            ->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'clientOptions' => [
                                        // 'minDate' => '+1m +1w',
                                        // 'maxDate'=> '+1m',                                        
                                        //'defaultDate'=>'-60',
                                        // 'numberOfMonths' => 2,
                                        //'yearRange' => '-115:+0',
                                        'changeMonth' => true,
                                        'changeYear' => true,
                                    ],
                                    'options' => ['class' => 'form-control', 'style' => 'width:100%','readonly' => 'readonly'] 
                                ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php

    $form = ActiveForm::begin([
        'id' => 'relacion', 
        'validateOnSubmit' => true,
        'action' => Yii::$app->request->baseUrl."/index.php?r=pagosvivienda%2Factualizar&id=".$model->id
    ]); 

        foreach ($modelCuentav as $obligacion) {
            //echo $form->field($modelDetalle, "[$inomina][$iempleado][$conceptoActual]salario_diario")->textInput();
            // echo $form->field($obligacion, "[$obligacion->id]cuentavivienda->id")->textInput([
            //                             'maxlength' => true, 
            //                             'style' => 'width:100%; background-color:'.$colorCampos,
            //                              "onchange"=>"actualizar($obligacion->id);"
            //                             ]);
            $vinculado = 0;
            $vinculado = CuentaviviendaPagosvivienda::find()->
                where([                    
                    'cuentavivienda_id' => $obligacion->id,
                    'pagosvivienda_id' => $model->id
                ])->one();
            if($vinculado)
            {
                $obligacion->montoapagar = $vinculado->montopagado;
                $obligacion->relacionar = 1;
            }
            $obligacion->montopagado = CuentaviviendaPagosvivienda::find()->where(['cuentavivienda_id' => $obligacion->id])->sum('montopagado');
            $obligacion->montofaltante = $obligacion->monto - $obligacion->montopagado;
            $obligacion->idObligacion = $obligacion->id;
            echo '<div style="display:none">';
                echo $form->field($obligacion, "idObligacion")->textInput();
                echo $form->field($obligacion, "[$obligacion->id]montopagado")->textInput();
                echo $form->field($obligacion, "[$obligacion->id]montofaltante")->textInput();
                echo $form->field($model, "[$obligacion->id]monto")->textInput();
            echo '</div>';
            
            echo $obligacion->tipoobligaciones->descripcion;
            echo $obligacion->descripcion;
            echo $obligacion->monto;
            echo 'monto pagado:'.$obligacion->montopagado;
            echo 'monto faltante:'.$obligacion->montofaltante;
            echo $form->field($obligacion, "[$obligacion->id]montoapagar")->textInput();
            echo $form->field($obligacion, "[$obligacion->id]relacionar")->checkbox();
            // echo $form->field($obligacion, 
            //         "[$obligacion->id]relacionar")->
            //             checkbox([
            //                 "onchange"=>"actualizar();"
            //             ]);
            echo Html::button('Actualizar', [ 'class' => 'btn btn-primary', 'onclick' => 'actualizar();' ]);

            //echo '<a class="btn btn-danger grid-button" onclick="actualizar()">Actualizar</a>';
            //echo "string";
            # code...
        }

    ActiveForm::end();

// print("Obligaciones");
// print_r($modelCuentav);
// print("Relaciones:");
// print_r($modelCuentavPagosv);


$script = <<< JS
       
        $('form#{relacion}').on('beforeSubmit', function(e)
        {
            $("#enviarNuevo").on('click', function(event){
            //if(document.getElementById("movimientos-accion").value == "guardar") {
                var \$form = $(this);
                $.post(
                    \$form.attr("action"), // serialize Yii2 form
                    \$form.serialize()
                )
                    .done(function(result) {
                        console.log(result);
                        //console.log("Pasa");
                    }).fail(function()
                        {
                            console.log("server error");
                        });
                    return false;
            });
        });
JS;
$this->registerJs($script);

?>