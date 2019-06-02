<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentavivienda_pagosvivienda".
 *
 * @property int $id
 * @property int $cuentavivienda_id
 * @property int $pagosvivienda_id
 * @property string $montopagado
 *
 * @property Cuentavivienda $cuentavivienda
 * @property Pagosvivienda $pagosvivienda
 */
class CuentaviviendaPagosvivienda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cuentavivienda_pagosvivienda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cuentavivienda_id', 'pagosvivienda_id', 'montopagado'], 'required'],
            [['cuentavivienda_id', 'pagosvivienda_id'], 'integer'],
            [['montopagado'], 'number'],
            [['cuentavivienda_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentavivienda::className(), 'targetAttribute' => ['cuentavivienda_id' => 'id']],
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
            'cuentavivienda_id' => Yii::t('app', 'Cuentavivienda ID'),
            'pagosvivienda_id' => Yii::t('app', 'Pagosvivienda ID'),
            'montopagado' => Yii::t('app', 'Montopagado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentavivienda()
    {
        return $this->hasOne(Cuentavivienda::className(), ['id' => 'cuentavivienda_id']);
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
     * @return CuentaviviendaPagosviviendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CuentaviviendaPagosviviendaQuery(get_called_class());
    }
}
