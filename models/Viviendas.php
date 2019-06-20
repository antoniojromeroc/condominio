<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viviendas".
 *
 * @property int $id
 * @property string $numero
 * @property string $calle
 * @property string $carrera
 * @property string $telefono
 * @property int $personas_id Representante
 * @property string $codigo Código asignada a cada vivienda por Administración de Condominio
 *
 * @property Cuentavivienda[] $cuentaviviendas
 * @property Pagosvivienda[] $pagosviviendas
 * @property Personas $personas
 * @property ViviendasPersonas[] $viviendasPersonas
 */
class Viviendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viviendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero'], 'required'], //'personas_id'
            [['personas_id'], 'integer'],
            [['numero'], 'string', 'max' => 10],
            [['nombre'], 'string', 'max' => 255], 
            [['calle', 'carrera'], 'string', 'max' => 35],
            [['telefono'], 'string', 'max' => 50],
            [['codigo'], 'string', 'max' => 150],
            // [['personas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['personas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'numero' => Yii::t('app', 'Numero'),
            'nombre' => Yii::t('app', 'Nombre'),
            'calle' => Yii::t('app', 'Calle'),
            'carrera' => Yii::t('app', 'Carrera'),
            'telefono' => Yii::t('app', 'Telefono'),
            'personas_id' => Yii::t('app', 'Representante'),
            'codigo' => Yii::t('app', 'Código'), // asignada a cada vivienda por Administración de Condominio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentaviviendas()
    {
        return $this->hasMany(Cuentavivienda::className(), ['viviendas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagosviviendas()
    {
        return $this->hasMany(Pagosvivienda::className(), ['viviendas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        //return $this->hasOne(Personas::className(), ['id' => 'personas_id']);
        return $this->hasMany(Personas::className(), ['viviendas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViviendasPersonas()
    {
        return $this->hasMany(ViviendasPersonas::className(), ['viviendas_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ViviendasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViviendasQuery(get_called_class());
    }
}
