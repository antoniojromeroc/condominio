<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RolOperacion]].
 *
 * @see RolOperacion
 */
class RolOperacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RolOperacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RolOperacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
