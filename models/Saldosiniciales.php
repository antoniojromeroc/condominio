<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saldosiniciales".
 *
 * @property int $id
 * @property int $anio
 * @property string $monto
 */
class Saldosiniciales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saldosiniciales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anio', 'monto'], 'required'],
            [['anio'], 'integer'],
            [['monto'], 'number'],
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
            'monto' => Yii::t('app', 'Monto'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SaldosinicialesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaldosinicialesQuery(get_called_class());
    }
}
