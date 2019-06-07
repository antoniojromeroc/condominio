<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_empresa".
 *
 * @property int $id
 * @property int $user_id
 * @property int $empresas_id
 *
 * @property Empresas $empresas
 * @property User $user
 */
class UserEmpresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'empresas_id'], 'required'],
            [['user_id', 'empresas_id'], 'integer'],
            [['empresas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['empresas_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'empresas_id' => Yii::t('app', 'Empresas ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasOne(Empresas::className(), ['id' => 'empresas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return UserEmpresaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserEmpresaQuery(get_called_class());
    }
}
