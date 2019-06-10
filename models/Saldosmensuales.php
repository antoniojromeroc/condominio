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
}
