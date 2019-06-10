<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ingresosegresos".
 *
 * @property int $id
 * @property int $conceptos_id
 * @property string $descripcion
 * @property string $fecha
 * @property string $monto
 *
 * @property Conceptos $conceptos
 */
class Ingresosegresos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingresosegresos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['conceptos_id', 'fecha', 'monto'], 'required'],
            [['conceptos_id'], 'integer'],
            [['fecha'], 'safe'],
            [['monto'], 'number'],
            [['descripcion'], 'string', 'max' => 250],
            [['conceptos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Conceptos::className(), 'targetAttribute' => ['conceptos_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'conceptos_id' => Yii::t('app', 'Conceptos ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha' => Yii::t('app', 'Fecha'),
            'monto' => Yii::t('app', 'Monto'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConceptos()
    {
        return $this->hasOne(Conceptos::className(), ['id' => 'conceptos_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngresosegresosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngresosegresosQuery(get_called_class());
    }

    public function getYearsList() {
        $currentYear = date('Y');
        $yearFrom = 2013;
        //$yearsRange = range($yearFrom, $currentYear);
        $yearsRange = range($currentYear, $yearFrom);
        return array_combine($yearsRange, $yearsRange);
    }

    /**
     * Permite carga de dropdownList
     */    
    public static function getListaConceptos()
    {
        $opciones = Conceptos::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'id', 'descripcion', 'tipo');
    }

}
