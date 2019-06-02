<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Operacion]].
 *
 * @see Operacion
 */
class OperacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Operacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Operacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
