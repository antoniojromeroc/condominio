<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historicomensualidad".
 *
 * @property int $id
 * @property string $fecha
 * @property string $monto
 */
class Historicomensualidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historicomensualidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'monto'], 'required'],
            [['fecha'], 'safe'],
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
            'fecha' => Yii::t('app', 'Fecha'),
            'monto' => Yii::t('app', 'Monto'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return HistoricomensualidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoricomensualidadQuery(get_called_class());
    }
}
