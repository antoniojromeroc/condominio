<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Directiva]].
 *
 * @see Directiva
 */
class DirectivaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Directiva[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Directiva|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
