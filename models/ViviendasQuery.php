<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Viviendas]].
 *
 * @see Viviendas
 */
class ViviendasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Viviendas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Viviendas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
