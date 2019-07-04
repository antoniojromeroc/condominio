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

    <div class="container-fluid">
        <div class="row">  
            <div class="row fondocampo" style="width:70%;">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
                    Datos del Depósito
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                    <?= $form->field($model, 'viviendas_id')
                        ->dropDownList($model->listaViviendas, 
                            ['prompt' => 'Seleccione Uno', 
                             'style'=>'width:100%',
                             "onchange"=>"Obligaciones();"
                            ]                 
                         );?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Bancos</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'bancoemisor_id')
                            ->dropDownList($model->listaBancos, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'bancoreceptor_id')
                            ->dropDownList($model->listaBancos, 
                                ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Datos del Depósito</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'num_operacion')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'num_cuenta')->textInput(['maxlength' => true]) ?>
                </div>
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'nombre_depositante')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                    <?= $form->field($model, 'cedula_depositante')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 bg-primary" style="font-size: 18px">
                    <center>Fechas</center>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
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
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
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
                </div>
                <div class="col-md-12"><br></div>
            <!-- <div class="container-fluid">
                <div class="form-group"> -->
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>
            <!--     </div> -->
                    <?php ActiveForm::end(); ?>
            <!-- </div> -->
                    <div class="col-md-12"><br></div>
                </div>
                <div class="col-md-12"><br></div>
            </div>
        </div>
<?php

    $form = ActiveForm::begin([
        'id' => 'relacion', 
        'validateOnSubmit' => true,
        'action' => Yii::$app->request->baseUrl."/index.php?r=pagosvivienda%2Factualizar&id=".$model->id
    ]); 

        
  ?>

<div class="container-fluid">
    <div class="row">
    <div class="row fondocampo" style="width:70%;">
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
        Obligaciones a Vincular con el Depósito
    </div>    

<div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
    <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div> -->
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12">          
<!--        Tipo
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
        descripción
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        Monto
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        Pagado
    </div>            
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        Faltante
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">          
        A Pagar
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">          
        Vincular
    </div> -->
    <div class="table-responsive text-nowrap">
        <!--Table-->
        <table class="table table-striped">

          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th>Tipo</th>
              <th>descripción</th>
              <th>Monto</th>
              <th>Pagado</th>
              <th>Faltante</th>
              <th>A Pagar</th>
              <th>Vincular</th>
            </tr>
          </thead>
          <!--Table head-->

          <!--Table body-->
          <tbody>
            <?php
            $posicion = 0;
            $montorestante = $model->monto;
            foreach ($modelCuentav as $obligacion) {
                $posicion++;
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
                    $montorestante = $montorestante - $vinculado->montopagado;
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
                ?>
                <tr>
                  <th scope="row"><?= $posicion ?></th>
                  <td><?= $obligacion->tipoobligaciones->descripcion; ?></td>
                  <td><?= $obligacion->descripcion; ?></td>
                  <td><?= $obligacion->monto; ?></td>
                  <td><?= $obligacion->montopagado; ?></td>
                  <td><?= number_format($obligacion->montofaltante,2) ?></td>
                  <td><?= $form->field($obligacion, "[$obligacion->id]montoapagar")->textInput()->label(false); ?></td>
                  <td><?= $form->field($obligacion, "[$obligacion->id]relacionar")->checkbox(['label' => false]); ?></td>
                </tr>
            <?php
            }
            ?>
          </tbody>
          <!--Table body-->
        </table>
        <!--Table-->
      </div>
  </div>
<!-- </section> -->
<!--Section: Live preview-->    
    <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
        
    </div> -->
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9"></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
        <center><strong><kbd>Monto Restante</kbd></strong></center>
        <div class="lineaazul"></div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10"></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
        <right><?= number_format($montorestante,2) ?></right>        
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10"></div>    
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
        <?= Html::button('Actualizar', [ 'class' => 'btn btn-primary', 'onclick' => 'actualizar();' ]); ?>
    </div>      
    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
<?php
    ActiveForm::end();
?>
</div>
<div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br><br></div>

<?php
// print("Obligaciones");
// print_r($modelCuentav);
// print("Relaciones:");
// print_r($modelCuentavPagosv);


// $script = <<< JS
       
//         $('form#{relacion}').on('beforeSubmit', function(e)
//         {
//             $("#enviarNuevo").on('click', function(event){
//             //if(document.getElementById("movimientos-accion").value == "guardar") {
//                 var \$form = $(this);
//                 $.post(
//                     \$form.attr("action"), // serialize Yii2 form
//                     \$form.serialize()
//                 )
//                     .done(function(result) {
//                         console.log(result);
//                         //console.log("Pasa");
//                     }).fail(function()
//                         {
//                             console.log("server error");
//                         });
//                     return false;
//             });
//         });
// JS;
// $this->registerJs($script);

?>