<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viviendas_personas".
 *
 * @property int $id
 * @property int $viviendas_id Vivienda
 * @property int $personas_id Persona
 *
 * @property Personas $personas
 * @property Viviendas $viviendas
 */
class ViviendasPersonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viviendas_personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['viviendas_id', 'personas_id'], 'required'],
            [['viviendas_id', 'personas_id'], 'integer'],
            [['personas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['personas_id' => 'id']],
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
            'viviendas_id' => Yii::t('app', 'Vivienda'),
            'personas_id' => Yii::t('app', 'Persona'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasOne(Personas::className(), ['id' => 'personas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getViviendas()
    {
        return $this->hasOne(Viviendas::className(), ['id' => 'viviendas_id']);
    }

    /**
     * {@inheritdoc}
     * @return ViviendasPersonasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ViviendasPersonasQuery(get_called_class());
    }
}
