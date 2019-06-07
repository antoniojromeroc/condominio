<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Saldosiniciales]].
 *
 * @see Saldosiniciales
 */
class SaldosinicialesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Saldosiniciales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Saldosiniciales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
