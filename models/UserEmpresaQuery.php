<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserEmpresa]].
 *
 * @see UserEmpresa
 */
class UserEmpresaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserEmpresa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserEmpresa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
