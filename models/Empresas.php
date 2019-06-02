<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property int $id
 * @property string $rif
 * @property string $razon_social
 * @property string $telefono
 * @property string $direccion
 * @property string $representante
 * @property string $logo_img
 *
 * @property UserEmpresa[] $userEmpresas
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rif', 'razon_social'], 'required'],
            [['rif'], 'string', 'max' => 10],
            [['razon_social', 'telefono'], 'string', 'max' => 150],
            [['direccion', 'representante'], 'string', 'max' => 255],
            [['logo_img'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rif' => Yii::t('app', 'Rif'),
            'razon_social' => Yii::t('app', 'Razon Social'),
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
            'representante' => Yii::t('app', 'Representante'),
            'logo_img' => Yii::t('app', 'Logo Img'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserEmpresas()
    {
        return $this->hasMany(UserEmpresa::className(), ['empresas_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return EmpresasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpresasQuery(get_called_class());
    }
}
