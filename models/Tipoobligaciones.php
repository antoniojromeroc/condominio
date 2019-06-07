<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipoobligaciones".
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property Cuentavivienda[] $cuentaviviendas
 * @property Historicoobligaciones[] $historicoobligaciones
 */
class Tipoobligaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoobligaciones';
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
    public function getCuentaviviendas()
    {
        return $this->hasMany(Cuentavivienda::className(), ['tipoobligaciones_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoricoobligaciones()
    {
        return $this->hasMany(Historicoobligaciones::className(), ['tipoobligaciones_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TipoobligacionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoobligacionesQuery(get_called_class());
    }
}
