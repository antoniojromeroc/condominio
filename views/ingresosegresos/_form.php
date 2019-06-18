<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\jui\DatePicker;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\Ingresosegresos */
/* @var $form yii\widgets\ActiveForm */

$ultimoDia = date("d",(mktime(0,0,0,$model['mes']+1,1,$model['anio']))-1);
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
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1" style="font-weight: bold;">
                    Año:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1" style="font-weight: bold;">
                    Mes:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Saldo Inicial:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Mes Anterior:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Ingresos:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Egresos:
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2" style="font-weight: bold;">
                    Saldo:
                </div>                
                <div class="text-primary" style="font-size: 18px;">
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br></div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
                        <?= $model['anio'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-1">
                        <?= $model['mes'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
						<?= $model['saldoInicial'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
						<?= $model['saldoMAnterior'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
                        <?= $model['monto_ingresos'] ?>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">
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
                    	<? //= //date("d",(mktime(0,0,0,$model['mes']+1,1,$model['anio']))-1) //date('m',strtotime("2011-01-07")) //gmdate('Y-m-d')//($model['mes']) ?>
                    	<?= $form->field($modelNuevoIE, 'fecha')
                               ->widget(DatePicker::className(),[
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'clientOptions' => [
						                // 'minDate' => '+1m +1w',
        								// 'maxDate'=> '+1m',
										'minDate' => $model['anio'].'-'.$model['mes'].'-01', 			  // minimum date  Ej: '2019-01-01'
        								'maxDate' => $model['anio'].'-'.$model['mes'].'-'.$ultimoDia,     // maximum date  Ej: '2019-01-31'
                                    	'yearRange' => $model['anio'].':'.$model['anio'],
                                    	//'defaultDate'=>'-60',
                                    	// 'numberOfMonths' => 2,
						                // 'changeMonth' => true,
                                        //'yearRange' => '-115:+0',
                                        'changeMonth' => false,
                                        'changeYear' => false,
                                    ],
                                    'options' => ['class' => 'form-control', 'style' => 'width:100%','readonly' => 'readonly'] 
                                ]) ?>
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
                            'options'=>['class' => 'btn btn-success', 
                            'onclick' => '(function ( $event ) { document.getElementById(\'movimientos-accion\').value = \'guardar\'; })();'],
                            'id' => 'enviarNuevo',                         
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
                     //echo '<div style="display:none;">';
					?>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-3"></div>
                	<div class="col-xs-12 col-sm-8 col-md-9 col-lg-6">
	                    <h2>Ingresos y Egresos</h2>
    	            </div>
        	        <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"></div>                                     

					<?php
				    	foreach ($modelIngresosegresos as $grupo){  
				    		//echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-3"></div>';
				            echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">';
				    		echo $form->field($grupo, "[$grupo->id]conceptos_id")
				    				->dropDownList($modelNuevoIE->listaConceptos, 
						            	['prompt' => 'Seleccione Uno', 'style'=>'width:100%']);
				    		echo '</div>';
				            echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-3">';
							echo $form->field($grupo, "[$grupo->id]descripcion")->textInput(['maxlength' => true]);
				    		echo '</div>';
				            echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">';
				    		echo $form->field($grupo, "[$grupo->id]fecha")
					    		->widget(DatePicker::className(),[
	                                    'dateFormat' => 'yyyy-MM-dd',
	                                    'clientOptions' => [
											'minDate' => $model['anio'].'-'.$model['mes'].'-01', 			  // minimum date  Ej: '2019-01-01'
	        								'maxDate' => $model['anio'].'-'.$model['mes'].'-'.$ultimoDia,     // maximum date  Ej: '2019-01-31'
	                                    	'yearRange' => $model['anio'].':'.$model['anio'],
	                                        'changeMonth' => false,
	                                        'changeYear' => false,
	                                    ],
	                                    'options' => ['class' => 'form-control', 'style' => 'width:100%', 'readonly' => 'readonly'] 
	                                ]);
				    		echo '</div>';
				            echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">';
				    		echo $form->field($grupo, "[$grupo->id]monto")->textInput(['maxlength' => true]);
				    		echo '</div>';
				            //echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-2">';
				            echo '<div class="col-xs-12 col-sm-8 col-md-9 col-lg-2"><br>';
                        	echo Html::a('Eliminar', ['/ingresosegresos/eliminar', 'id' => $grupo->id, 'idSM' => $model['id']], ['class'=>'btn btn-danger grid-button',
                                    'data' => [
                                    'confirm' => 'Está seguro de Eliminar este registro?',
                                    'method' => 'post',
                                ]]);
                        	echo '</div>';
						}
					?>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br /></div>

                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-12"><br><br></div>
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