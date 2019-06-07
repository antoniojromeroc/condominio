<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargos".
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property Miembrosdirectiva[] $miembrosdirectivas
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 150],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiembrosdirectivas()
    {
        return $this->hasMany(Miembrosdirectiva::className(), ['cargos_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CargosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CargosQuery(get_called_class());
    }
}
