<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recibos".
 *
 * @property int $id
 * @property string $numero
 * @property int $pagosvivienda_id
 * @property string $descripcion
 *
 * @property Pagosvivienda $pagosvivienda
 */
class Recibos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recibos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero', 'pagosvivienda_id', 'descripcion'], 'required'],
            [['pagosvivienda_id'], 'integer'],
            [['numero'], 'string', 'max' => 150],
            [['descripcion'], 'string', 'max' => 250],
            [['pagosvivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pagosvivienda::className(), 'targetAttribute' => ['pagosvivienda_id' => 'id']],
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
            'pagosvivienda_id' => Yii::t('app', 'Pagosvivienda ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagosvivienda()
    {
        return $this->hasOne(Pagosvivienda::className(), ['id' => 'pagosvivienda_id']);
    }

    /**
     * {@inheritdoc}
     * @return RecibosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RecibosQuery(get_called_class());
    }
}
