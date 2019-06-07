<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "juntacondominio".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property string $urbanizacion
 * @property string $telefono1
 * @property string $telefono2
 * @property string $telefono3
 */
class Juntacondominio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'juntacondominio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion'], 'required'],
            [['nombre', 'direccion'], 'string', 'max' => 250],
            [['urbanizacion'], 'string', 'max' => 150],
            [['telefono1', 'telefono2', 'telefono3'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Direccion'),
            'urbanizacion' => Yii::t('app', 'Urbanizacion'),
            'telefono1' => Yii::t('app', 'Telefono1'),
            'telefono2' => Yii::t('app', 'Telefono2'),
            'telefono3' => Yii::t('app', 'Telefono3'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return JuntacondominioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JuntacondominioQuery(get_called_class());
    }
}
