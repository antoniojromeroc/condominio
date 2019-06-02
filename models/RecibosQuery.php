<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Recibos]].
 *
 * @see Recibos
 */
class RecibosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Recibos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Recibos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
