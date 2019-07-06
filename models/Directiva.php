<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directiva".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $fecha_ini
 * @property string $fecha_fin
 *
 * @property Miembrosdirectiva[] $miembrosdirectivas
 */
class Directiva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directiva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['fecha_ini', 'fecha_fin'], 'safe'],
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
            'fecha_ini' => Yii::t('app', 'Fecha Ini'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiembrosdirectivas()
    {
        return $this->hasMany(Miembrosdirectiva::className(), ['directiva_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DirectivaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DirectivaQuery(get_called_class());
    }
}
