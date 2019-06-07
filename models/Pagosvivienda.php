<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagosvivienda".
 *
 * @property int $id
 * @property int $viviendas_id
 * @property string $monto
 * @property string $num_operacion
 * @property int $bancoemisor_id
 * @property int $bancoreceptor_id
 * @property string $num_cuenta
 * @property string $fecha_deposito
 * @property string $fecha_disponible
 *
 * @property CuentaviviendaPagosvivienda[] $cuentaviviendaPagosviviendas
 * @property Bancos $bancoemisor
 * @property Bancos $bancoreceptor
 * @property Viviendas $viviendas
 * @property Recibos[] $recibos
 */
class Pagosvivienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagosvivienda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['viviendas_id', 'monto', 'num_operacion', 'bancoemisor_id', 'bancoreceptor_id', 'num_cuenta', 'fecha_deposito'], 'required'],
            [['viviendas_id', 'bancoemisor_id', 'bancoreceptor_id'], 'integer'],
            [['monto'], 'number'],
            [['fecha_deposito', 'fecha_disponible'], 'safe'],
            [['num_operacion', 'num_cuenta'], 'string', 'max' => 50],
            [['bancoemisor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bancos::className(), 'targetAttribute' => ['bancoemisor_id' => 'id']],
            [['bancoreceptor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bancos::className(), 'targetAttribute' => ['bancoreceptor_id' => 'id']],
            [['viviendas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viviendas::className(), 'targetAttribute' => ['viviendas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'viviendas_id' => Yii::t('app', 'Viviendas ID'),
            'monto' => Yii::t('app', 'Monto'),
            'num_operacion' => Yii::t('app', 'Num Operacion'),
            'bancoemisor_id' => Yii::t('app', 'Bancoemisor ID'),
            'bancoreceptor_id' => Yii::t('app', 'Bancoreceptor ID'),
            'num_cuenta' => Yii::t('app', 'Num Cuenta'),
            'fecha_deposito' => Yii::t('app', 'Fecha Deposito'),
            'fecha_disponible' => Yii::t('app', 'Fecha Disponible'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentaviviendaPagosviviendas()
    {
        return $this->hasMany(CuentaviviendaPagosvivienda::className(), ['pagosvivienda_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBancoemisor()
    {
        return $this->hasOne(Bancos::className(), ['id' => 'bancoemisor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBancoreceptor()
    {
        return $this->hasOne(Bancos::className(), ['id' => 'bancoreceptor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViviendas()
    {
        return $this->hasOne(Viviendas::className(), ['id' => 'viviendas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibos()
    {
        return $this->hasMany(Recibos::className(), ['pagosvivienda_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PagosviviendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagosviviendaQuery(get_called_class());
    }
}
