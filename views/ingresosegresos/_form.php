<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\Ingresosegresos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingresosegresos-form formulario">

<div class="container-fluid">
        <div class="row">  
            <div class="row fondocampo" style="width:70%;">
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12 fondoCabecera">
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                        <h3> Periodo:</h3>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                        <!-- <h3>Relación:</h3> -->
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Año:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Mes:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3" style="font-weight: bold;">
                    Ingresos:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3" style="font-weight: bold;">
                    Egresos:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Saldo:
                </div>                
                <div class="text-primary" style="font-size: 18px;">
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= $model['anio'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= $model['mes'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
                        <?= $model['monto_ingresos'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
                        <?= $model['monto_egresos'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= $model['saldo'] ?>
                    </div>                
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                <div class="col-md-12 lineaazul"></div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                <br />

    			<?php $form = ActiveForm::begin([
                        'id' => $modelNuevoIE->formName(), 
                        'validateOnSubmit' => true
                    ]); ?>

				 <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-5">
                        <h2>Incluir Movimiento</h2>
                        <div style="display:none;">
<!--                        //echo $form->field($modelSueldos, 'accion')->textInput([]);-->
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                    <!-- <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1"></div> -->
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
                        <?= $form->field($modelNuevoIE, 'conceptos_id')
		                        ->dropDownList($modelNuevoIE->listaConceptos, 
		                            ['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">
                        <?= $form->field($modelNuevoIE, 'descripcion')->textInput([
                                    'maxlength' => true, 
                                    'style' => 'width:100%'
                                ]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                    	<?= $form->field($modelNuevoIE, 'fecha')->textInput();
                               // ->widget(DatePicker::className(),[
                               //      'dateFormat' => 'yyyy-MM-dd',
                               //      'clientOptions' => [
                               //          'yearRange' => '-115:+0',
                               //          'changeMonth' => true,
                               //          'changeYear' => true
                               //      ],
                               //      'options' => ['class' => 'form-control', 'style' => 'width:100%'] 
                                // ]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= $form->field($modelNuevoIE, 'monto')->textInput([
                                    'maxlength' => true, 
                                    'style' => 'width:100%'
                                ]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <br>
                        <?= Button::Widget([
                            'label'=>'Incluir',
                            'options'=>['class' => 'btn btn-success', 'onclick' => '(function ( $event ) { document.getElementById(\'movimientos-accion\').value = \'guardar\'; })();'],
                            'id' => 'enviar',                         
                            //'url' => Url::toRoute(['/controller/action']),
                            ]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                    <?php ActiveForm::end(); ?>
                     <?php 
                     $form = ActiveForm::begin([
                        'id' => $model->formName(), 
                        'validateOnSubmit' => true,
                        'action' => Yii::$app->request->baseUrl."/index.php?r=sueldos%2Factualizar&id=".$model->id
                    ]); 
                     echo '<div style="display:none;">';
					?>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3"></div>
                	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-6">
	                    <h2>Ingresos y Egresos</h2>
    	            </div>
        	        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>
                                        

	<?php
    	foreach ($modelIngresosegresos as $grupo){   
    		echo $form->field($grupo, "[$grupo->id]conceptos_id")->textInput();

			echo $form->field($grupo, "[$grupo->id]descripcion")->textInput(['maxlength' => true]);

    		echo $form->field($grupo, "[$grupo->id]fecha")->textInput();

    		echo $form->field($grupo, "[$grupo->id]monto")->textInput(['maxlength' => true]);
		}
	?>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS
       
        $('form#{$modelNuevoIE->formName()}').on('beforeSubmit', function(e)
        {
            if(document.getElementById("movimientos-accion").value == "guardar") {
                var \$form = $(this);
                //alert("Esta guardando");
                $.post(
                    \$form.attr("action"), // serialize Yii2 form
                    \$form.serialize()
                )
                    .done(function(result) {
                        //alert("pasando");
                        console.log(result);
                        //console.log("Pasa");
                    }).fail(function()
                        {
                            console.log("server error");
                        });
                    return false;
           }
        });
JS;
$this->registerJs($script);

?>