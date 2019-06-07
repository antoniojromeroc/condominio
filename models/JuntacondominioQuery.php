<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Juntacondominio]].
 *
 * @see Juntacondominio
 */
class JuntacondominioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Juntacondominio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Juntacondominio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
