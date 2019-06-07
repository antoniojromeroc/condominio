<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ingresosegresos]].
 *
 * @see Ingresosegresos
 */
class IngresosegresosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ingresosegresos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ingresosegresos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
