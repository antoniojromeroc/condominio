<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bancos".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Pagosvivienda[] $pagosviviendas
 * @property Pagosvivienda[] $pagosviviendas0
 */
class Bancos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bancos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 250],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagosviviendas()
    {
        return $this->hasMany(Pagosvivienda::className(), ['bancoemisor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagosviviendas0()
    {
        return $this->hasMany(Pagosvivienda::className(), ['bancoreceptor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BancosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BancosQuery(get_called_class());
    }
}
