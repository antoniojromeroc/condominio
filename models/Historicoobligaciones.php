<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "historicoobligaciones".
 *
 * @property int $id
 * @property string $fecha
 * @property int $tipoobligaciones_id
 * @property string $monto
 *
 * @property Tipoobligaciones $tipoobligaciones
 */
class Historicoobligaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historicoobligaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'tipoobligaciones_id', 'monto'], 'required'],
            [['fecha'], 'safe'],
            [['tipoobligaciones_id'], 'integer'],
            [['monto'], 'number'],
            [['tipoobligaciones_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoobligaciones::className(), 'targetAttribute' => ['tipoobligaciones_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'tipoobligaciones_id' => Yii::t('app', 'Tipoobligaciones ID'),
            'monto' => Yii::t('app', 'Monto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoobligaciones()
    {
        return $this->hasOne(Tipoobligaciones::className(), ['id' => 'tipoobligaciones_id']);
    }

    /**
     * {@inheritdoc}
     * @return HistoricoobligacionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HistoricoobligacionesQuery(get_called_class());
    }

    /**
     * Permite carga de dropdownList
     */    
    public static function getListaTipoObligaciones()
    {
        $opciones = Tipoobligaciones::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'id', 'descripcion');
    }
}
