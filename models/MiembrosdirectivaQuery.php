<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Miembrosdirectiva]].
 *
 * @see Miembrosdirectiva
 */
class MiembrosdirectivaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Miembrosdirectiva[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Miembrosdirectiva|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
