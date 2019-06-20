<!-- <style>
/*     th {
    display: table-cell;
    vertical-align: inherit;
    font-weight: bold;
}*/
    .scroll-pane { overflow: auto; width: 97%; float:left; }
    .scroll-content { width: 3800px; float: left; padding-left: 11px;}
    /*.scroll-content { width: 200%; float: left; }*/
    .scroll-content-item { width: 100px; height: 100px; float: left; margin: 10px; font-size: 13em; line-height: 96px; text-align: center; }
    * html .scroll-content-item { display: inline; } /* IE6 float double margin bug */
    .scroll-bar-wrap { clear: left; padding: 0 4px 0 2px; margin: 0 -1px -1px -1px; }
    .scroll-bar-wrap .ui-slider { background: none; border:0; height: 2em; margin: 0 auto;  }
    .scroll-bar-wrap .ui-handle-helper-parent { position: relative; width: 100%; height: 100%; margin: 0 auto; }
    .scroll-bar-wrap .ui-slider-handle { top:.2em; height: 1.5em; }
    .scroll-bar-wrap .ui-slider-handle .ui-icon { margin: -8px auto 0; position: relative; top: 50%; }
</style> -->

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Viviendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viviendas-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carrera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'personas_id')->textInput() ?> -->

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
<!-- <div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
    <div class="scroll-content">
        <div class="scroll-content-item ui-widget-header">1</div>
        <div class="scroll-content-item ui-widget-header">2</div>
        <div class="scroll-content-item ui-widget-header">3</div>
        <div class="scroll-content-item ui-widget-header">4</div>
        <div class="scroll-content-item ui-widget-header">5</div>
        <div class="scroll-content-item ui-widget-header">6</div>
        <div class="scroll-content-item ui-widget-header">7</div>
        <div class="scroll-content-item ui-widget-header">8</div>
        <div class="scroll-content-item ui-widget-header">9</div>
        <div class="scroll-content-item ui-widget-header">10</div>
        <div class="scroll-content-item ui-widget-header">11</div>
        <div class="scroll-content-item ui-widget-header">12</div>
        <div class="scroll-content-item ui-widget-header">13</div>
        <div class="scroll-content-item ui-widget-header">14</div>
        <div class="scroll-content-item ui-widget-header">15</div>
        <div class="scroll-content-item ui-widget-header">16</div>
        <div class="scroll-content-item ui-widget-header">17</div>
        <div class="scroll-content-item ui-widget-header">18</div>
        <div class="scroll-content-item ui-widget-header">19</div>
        <div class="scroll-content-item ui-widget-header">20</div>
    </div>
    <div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
        <div class="scroll-bar"></div>
    </div>
</div> -->


<!--/********************************************/-->
          
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be added (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsPersonas[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nacionalidad',
                    'cedula_identidad',
                    'primer_apellido',
                    'segundo_apellido',
                    'primer_nombre',
                    'segundo_nombre',
                    'sexo',
                    'celular',
                    'telefono_local',
                    'email',
                    'responsable_vivienda',
                ],
            ]); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <i class="glyphicon glyphicon-envelope"></i> Habitantes de la vivienda
                        <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="container-items"><!-- widgetBody -->
                    <?php foreach ($modelsPersonas as $i => $modelPersonas): ?>
                        <div class="item panel panel-default"><!-- widgetItem -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Habitante: </h3>
                                <div class="pull-right">
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                    if (! $modelPersonas->isNewRecord) {
                                        echo Html::activeHiddenInput($modelPersonas, "[{$i}]id");
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <?= $form->field($modelPersonas, "[{$i}]nacionalidad")
                                            ->dropDownList([ 'V' => 'Venezolano', 'E' => 'Extranjero'])?>                                        
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($modelPersonas, "[{$i}]cedula_identidad")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div><!-- .row -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]primer_apellido")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]segundo_apellido")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]primer_nombre")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]segundo_nombre")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]sexo")
                                            ->dropDownList([ 'MASCULINO' => 'Masculino', 'FEMENINO' => 'Femenino'])?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]celular")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]telefono_local")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]email")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?= $form->field($modelPersonas, "[{$i}]responsable_vivienda")->checkbox(array(
                                            'label'=>'',
                                            'labelOptions'=>array('style'=>'padding:5px;'),
                                            //'disabled'=>true
                                            ))
                                            ->label('Responsable Vivienda'); ?>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div><!-- .panel -->
            <?php DynamicFormWidget::end(); ?>
    
            <!--/********************************************/-->           
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
