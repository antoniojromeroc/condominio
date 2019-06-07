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
}
