<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conceptos".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $tipo
 *
 * @property Ingresosegresos[] $ingresosegresos
 */
class Conceptos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conceptos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'tipo'], 'required'],
            [['tipo'], 'string'],
            [['descripcion'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngresosegresos()
    {
        return $this->hasMany(Ingresosegresos::className(), ['conceptos_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ConceptosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConceptosQuery(get_called_class());
    }
}
