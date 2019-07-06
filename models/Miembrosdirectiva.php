<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "miembrosdirectiva".
 *
 * @property int $id
 * @property int $directiva_id
 * @property int $miembros_id
 * @property int $cargos_id
 *
 * @property Cargos $cargos
 * @property Directiva $directiva
 * @property Miembros $miembros
 */
class Miembrosdirectiva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'miembrosdirectiva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['directiva_id', 'miembros_id', 'cargos_id'], 'required'],
            [['directiva_id', 'miembros_id', 'cargos_id'], 'integer'],
            [['cargos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['cargos_id' => 'id']],
            [['directiva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Directiva::className(), 'targetAttribute' => ['directiva_id' => 'id']],
            [['miembros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Miembros::className(), 'targetAttribute' => ['miembros_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'directiva_id' => Yii::t('app', 'Directiva ID'),
            'miembros_id' => Yii::t('app', 'Miembros ID'),
            'cargos_id' => Yii::t('app', 'Cargos ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargos()
    {
        return $this->hasOne(Cargos::className(), ['id' => 'cargos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectiva()
    {
        return $this->hasOne(Directiva::className(), ['id' => 'directiva_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiembros()
    {
        return $this->hasOne(Miembros::className(), ['id' => 'miembros_id']);
    }

    /**
     * {@inheritdoc}
     * @return MiembrosdirectivaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MiembrosdirectivaQuery(get_called_class());
    }
}
