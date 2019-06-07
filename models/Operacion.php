<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operacion".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property RolOperacion[] $rolOperacions
 * @property Rol[] $rols
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 64],
            [['nombre'], 'unique'],
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
    public function getRolOperacions()
    {
        return $this->hasMany(RolOperacion::className(), ['operacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRols()
    {
        return $this->hasMany(Rol::className(), ['id' => 'rol_id'])->viaTable('rol_operacion', ['operacion_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OperacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperacionQuery(get_called_class());
    }
}
