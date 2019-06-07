<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentavivienda".
 *
 * @property int $id
 * @property int $viviendas_id
 * @property int $tipoobligaciones_id
 * @property string $descripcion
 * @property int $mes
 * @property int $anio
 * @property string $monto
 * @property string $fecha_vencimiento
 * @property string $monto_faltante
 *
 * @property Viviendas $viviendas
 * @property Tipoobligaciones $tipoobligaciones
 * @property CuentaviviendaPagosvivienda[] $cuentaviviendaPagosviviendas
 */
class Cuentavivienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuentavivienda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viviendas_id', 'descripcion', 'mes', 'anio', 'monto'], 'required'],
            [['id', 'viviendas_id', 'tipoobligaciones_id', 'mes', 'anio'], 'integer'],
            [['monto', 'monto_faltante'], 'number'],
            [['fecha_vencimiento'], 'safe'],
            [['descripcion'], 'string', 'max' => 250],
            [['id'], 'unique'],
            [['viviendas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Viviendas::className(), 'targetAttribute' => ['viviendas_id' => 'id']],
            [['tipoobligaciones_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoobligaciones::className(), 'targetAttribute' => ['tipoobligaciones_id' => 'id']],
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
            'tipoobligaciones_id' => Yii::t('app', 'Tipoobligaciones ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'mes' => Yii::t('app', 'Mes'),
            'anio' => Yii::t('app', 'Anio'),
            'monto' => Yii::t('app', 'Monto'),
            'fecha_vencimiento' => Yii::t('app', 'Fecha Vencimiento'),
            'monto_faltante' => Yii::t('app', 'Monto Faltante'),
        ];
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
    public function getTipoobligaciones()
    {
        return $this->hasOne(Tipoobligaciones::className(), ['id' => 'tipoobligaciones_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentaviviendaPagosviviendas()
    {
        return $this->hasMany(CuentaviviendaPagosvivienda::className(), ['cuentavivienda_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CuentaviviendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CuentaviviendaQuery(get_called_class());
    }
}
