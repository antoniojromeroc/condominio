<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ingresosegresos".
 *
 * @property int $id
 * @property int $conceptos_id
 * @property string $descripcion
 * @property string $fecha
 * @property string $monto
 *
 * @property Conceptos $conceptos
 */
class Ingresosegresos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingresosegresos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conceptos_id', 'fecha', 'monto'], 'required'],
            [['conceptos_id'], 'integer'],
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['descripcion'], 'string', 'max' => 250],
            [['conceptos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conceptos::className(), 'targetAttribute' => ['conceptos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'conceptos_id' => Yii::t('app', 'Conceptos ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha' => Yii::t('app', 'Fecha'),
            'monto' => Yii::t('app', 'Monto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptos()
    {
        return $this->hasOne(Conceptos::className(), ['id' => 'conceptos_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngresosegresosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngresosegresosQuery(get_called_class());
    }

    public function getYearsList() {
        $currentYear = date('Y');
        $yearFrom = 2013;
        //$yearsRange = range($yearFrom, $currentYear);
        $yearsRange = range($currentYear, $yearFrom);
        return array_combine($yearsRange, $yearsRange);
    }

    /**
     * Permite carga de dropdownList
     */    
    public static function getListaConceptos()
    {
        $opciones = Conceptos::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'id', 'descripcion', 'tipo');
    }

    /**
     * Calcular montos de ingresos y egresos
     */    

    public static function existeSaldoInicial($anio)
    {
        if(Saldosiniciales::find()->where(['anio' => $anio])->one()) return 1;
        else return 0;
    }

    public static function calcularSaldos($anio, $mes)
    {
        $sInicial = 0;
        $sMesAnterior = 0;
        $sMensualIngresos = 0;
        $sMensualEgresos = 0;
        $sMensual = 0;
        $stringAretornar = '';

        $sInicial = Saldosiniciales::find()
            ->select('monto')
            ->where(['anio' => $anio])
            ->one();

        $sMensualIngresos =  Ingresosegresos::find()
            ->leftJoin('conceptos as cp', 'ingresosegresos.conceptos_id = cp.id')
            ->where(['YEAR(fecha)' => $anio])
            // ->andWhere(['>=', 'MONTH(fecha)', 01])
            // ->andWhere(['<=', 'MONTH(fecha)', $mes])
            ->andWhere(['=', 'MONTH(fecha)', $mes])
            ->andWhere(['cp.tipo' => 'INGRESO'])
            // ->where([
            //     'YEAR(fecha)' => $anio, 
            //     'MONTH(fecha)' => $mes,
            //     'cp.tipo' => 'INGRESO'
            // ])
            ->sum('monto');

        $sMensualEgresos =  Ingresosegresos::find()
            ->leftJoin('conceptos as cp', 'ingresosegresos.conceptos_id = cp.id')
            ->where(['YEAR(fecha)' => $anio])
            ->andWhere(['=', 'MONTH(fecha)', $mes])
            ->andWhere(['cp.tipo' => 'EGRESO'])
            ->sum('monto');

        if($mes > 1)
        {
            $sMesAnterior = Saldosmensuales::find()
                ->select('saldo')
                ->where(['anio' => $anio])
                ->andWhere(['mes' => $mes-1])
                ->one();
            $sMensual = $sMesAnterior['saldo']+$sMensualIngresos-$sMensualEgresos;
        } else 
        {
            $sMensual = $sInicial['monto']+$sMensualIngresos-$sMensualEgresos;
        }

        $stringAretornar = $sInicial['monto'].';'.$sMesAnterior['saldo'].';'.$sMensualIngresos.';'.$sMensualEgresos.';'.$sMensual;
        //print_r($sMensualIngresos);
        //print_r($sMesAnterior['saldo']);
        // print($stringAretornar);
        //  die();
        //return $sInicial.','.$sMensualIngresos['monto'];
        return $stringAretornar;
    }

}
