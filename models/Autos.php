<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autos".
 *
 * @property int $id
 * @property string $num_placa
 * @property string $marca
 * @property string $modelo
 * @property string $anio
 * @property string $color
 * @property string $codigo
 * @property int $personas_id Responsable
 *
 * @property Personas $personas
 */
class Autos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_placa', 'personas_id'], 'required'],
            [['personas_id'], 'integer'],
            [['num_placa'], 'string', 'max' => 25],
            [['marca', 'modelo', 'color'], 'string', 'max' => 150],
            [['anio'], 'string', 'max' => 4],
            [['codigo'], 'string', 'max' => 250],
            [['personas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['personas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'num_placa' => Yii::t('app', 'Num Placa'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'anio' => Yii::t('app', 'Anio'),
            'color' => Yii::t('app', 'Color'),
            'codigo' => Yii::t('app', 'Codigo'),
            'personas_id' => Yii::t('app', 'Responsable'),
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
     * {@inheritdoc}
     * @return AutosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutosQuery(get_called_class());
    }
}
