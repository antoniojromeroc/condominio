<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saldosmensuales".
 *
 * @property int $id
 * @property int $anio
 * @property int $mes
 * @property string $monto_ingresos
 * @property string $monto_egresos
 * @property string $saldo
 */
class Saldosmensuales extends \yii\db\ActiveRecord
{

    Public $saldoInicial = 0;
    Public $saldoMAnterior = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saldosmensuales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anio', 'mes'], 'required'],
            [['anio', 'mes'], 'integer'],
            [['monto_ingresos', 'monto_egresos', 'saldo'], 'number'],
            [['anio', 'mes'], 'unique', 'targetAttribute' => ['anio', 'mes']],
            //, 'message' => 'El Peridodo de Año y Mes ya existe.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'anio' => Yii::t('app', 'Anio'),
            'mes' => Yii::t('app', 'Mes'),
            'monto_ingresos' => Yii::t('app', 'Monto Ingresos'),
            'monto_egresos' => Yii::t('app', 'Monto Egresos'),
            'saldo' => Yii::t('app', 'Saldo'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SaldosmensualesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaldosmensualesQuery(get_called_class());
    }

    /**
     * Busqueda de registro unico para validacion
     * 
     */
    public static function buscaunico($tabla, $campo1, $campo2 = false, $valor1, $valor2 = false)
    {
        if ($campo2) {
            if($tabla::find()->where([ $campo1 => $valor1, $campo2 => $valor2])->one()) return true;
        } else {
            if($tabla::find()->where([ $campo1 => $valor1])->one()) return true;
        }
        return false;
    }

    public static function recalcular($anio)
    {
        $sInicial = 0;

        $sInicial = Saldosiniciales::find()
            ->select('monto')
            ->where(['anio' => $anio])
            ->one();

        for ($mes=1; $mes <= 12; $mes++) { 
            /*  Definicion y limpieza de variables*/
            $sMesAnterior = 0;
            $sMensualIngresos = 0;
            $sMensualEgresos = 0;
            $sMensual = 0;
            $sMesActual = 0;   

            $sMensualIngresos =  Ingresosegresos::find()
                ->leftJoin('conceptos as cp', 'ingresosegresos.conceptos_id = cp.id')
                ->where(['YEAR(fecha)' => $anio])
                ->andWhere(['=', 'MONTH(fecha)', $mes])
                ->andWhere(['cp.tipo' => 'INGRESO'])
                ->sum('monto');
            $sMensualEgresos =  Ingresosegresos::find()
                ->leftJoin('conceptos as cp', 'ingresosegresos.conceptos_id = cp.id')
                ->where(['YEAR(fecha)' => $anio])
                ->andWhere(['=', 'MONTH(fecha)', $mes])
                ->andWhere(['cp.tipo' => 'EGRESO'])
                ->sum('monto');
            if($sMensualIngresos or $sMensualEgresos)
            {
                if(is_null($sMensualIngresos)) $sMensualIngresos = 0;
                if(is_null($sMensualEgresos)) $sMensualEgresos = 0;
                if($mes == 1)
                {
                    $sMesActual = Saldosmensuales::find()
                        //->select('saldo')
                        ->where(['anio' => $anio])
                        ->andWhere(['mes' => $mes])
                        ->one();
                    //$sMensual = $sMesAnterior['saldo']+$sMensualIngresos-$sMensualEgresos;
                    $sMensual = $sInicial['monto']+$sMensualIngresos-$sMensualEgresos;
                    if($sMesActual)
                    {
                        $sMesActual->monto_ingresos = $sMensualIngresos;
                        $sMesActual->monto_egresos = $sMensualEgresos;
                        $sMesActual->saldo = $sMensual;
                        $sMesActual->save();
                    }
                } else 
                {
                    $sMesAnterior = Saldosmensuales::find()
                        ->select('saldo')
                        ->where(['anio' => $anio])
                        ->andWhere(['mes' => $mes-1])
                        ->one();
                    $sMesActual = Saldosmensuales::find()
                        //->select('saldo')
                        ->where(['anio' => $anio])
                        ->andWhere(['mes' => $mes])
                        ->one();
                    if($sMesActual)
                    {
                        $sMensual = $sMesAnterior['saldo']+$sMensualIngresos-$sMensualEgresos;
                        $sMesActual->monto_ingresos = $sMensualIngresos;
                        $sMesActual->monto_egresos = $sMensualEgresos;
                        $sMesActual->saldo = $sMensual;
                        $sMesActual->save();
                    }
                }
            }            
        }
        return true;
    }
}
