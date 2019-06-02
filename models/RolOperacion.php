<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol_operacion".
 *
 * @property int $rol_id
 * @property int $operacion_id
 *
 * @property Operacion $operacion
 * @property Rol $rol
 */
class RolOperacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rol_operacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_id', 'operacion_id'], 'required'],
            [['rol_id', 'operacion_id'], 'integer'],
            [['rol_id', 'operacion_id'], 'unique', 'targetAttribute' => ['rol_id', 'operacion_id']],
            [['operacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Operacion::className(), 'targetAttribute' => ['operacion_id' => 'id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rol_id' => Yii::t('app', 'Rol ID'),
            'operacion_id' => Yii::t('app', 'Operacion ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacion()
    {
        return $this->hasOne(Operacion::className(), ['id' => 'operacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }

    /**
     * {@inheritdoc}
     * @return RolOperacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RolOperacionQuery(get_called_class());
    }
}
