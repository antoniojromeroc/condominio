<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "miembros".
 *
 * @property int $id
 * @property string $cedula_identidad
 * @property string $nacionalidad
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $sexo
 * @property string $celular
 * @property string $telefono_local
 * @property string $email
 *
 * @property Miembrosdirectiva[] $miembrosdirectivas
 */
class Miembros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'miembros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cedula_identidad', 'primer_apellido', 'primer_nombre', 'sexo'], 'required'],
            [['cedula_identidad'], 'string', 'max' => 15],
            [['nacionalidad'], 'string', 'max' => 1],
            [['primer_apellido', 'segundo_apellido', 'primer_nombre', 'segundo_nombre', 'sexo', 'celular', 'telefono_local'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cedula_identidad' => Yii::t('app', 'Cedula Identidad'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'primer_apellido' => Yii::t('app', 'Primer Apellido'),
            'segundo_apellido' => Yii::t('app', 'Segundo Apellido'),
            'primer_nombre' => Yii::t('app', 'Primer Nombre'),
            'segundo_nombre' => Yii::t('app', 'Segundo Nombre'),
            'sexo' => Yii::t('app', 'Sexo'),
            'celular' => Yii::t('app', 'Celular'),
            'telefono_local' => Yii::t('app', 'Telefono Local'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiembrosdirectivas()
    {
        return $this->hasMany(Miembrosdirectiva::className(), ['miembros_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MiembrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MiembrosQuery(get_called_class());
    }
}
