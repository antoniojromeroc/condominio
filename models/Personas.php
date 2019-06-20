<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $id
 * @property string $cedula_identidad
 * @property string $nacionalidad
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $sexo
 * @property string $celular
 * @property string $telefono_local
 * @property string $email
 * @property int $viviendas_id Vivienda donde habita
 * @property int $responsable_vivienda
 *
 * @property Autos[] $autos
 * @property Viviendas $viviendas
 * @property Viviendas[] $viviendas0
 * @property ViviendasPersonas[] $viviendasPersonas
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_identidad', 'primer_apellido', 'primer_nombre', 'sexo', 'viviendas_id'], 'required'],
            [['viviendas_id', 'responsable_vivienda'], 'integer'],
            [['cedula_identidad'], 'string', 'max' => 15],
            [['nacionalidad'], 'string', 'max' => 1],
            [['primer_apellido', 'segundo_apellido', 'primer_nombre', 'segundo_nombre', 'sexo', 'celular', 'telefono_local'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 250],
            ['email', 'email'],
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
            'cedula_identidad' => Yii::t('app', 'Cedula Identidad'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'primer_apellido' => Yii::t('app', 'Primer Apellido'),
            'segundo_apellido' => Yii::t('app', 'Segundo Apellido'),
            'primer_nombre' => Yii::t('app', 'Primer Nombre'),
            'segundo_nombre' => Yii::t('app', 'Segundo Nombre'),
            'sexo' => Yii::t('app', 'Sexo'),
            'celular' => Yii::t('app', 'Celular'),
            'telefono_local' => Yii::t('app', 'Telefono Local'),
            'email' => Yii::t('app', 'Email'),
            'viviendas_id' => Yii::t('app', 'Vivienda'),
            'responsable_vivienda' => Yii::t('app', 'Responsable Vivienda'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Autos::className(), ['personas_id' => 'id']);
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
    public function getViviendas0()
    {
        return $this->hasMany(Viviendas::className(), ['personas_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViviendasPersonas()
    {
        return $this->hasMany(ViviendasPersonas::className(), ['personas_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PersonasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonasQuery(get_called_class());
    }
}
