<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ViviendasPersonas]].
 *
 * @see ViviendasPersonas
 */
class ViviendasPersonasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ViviendasPersonas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ViviendasPersonas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
