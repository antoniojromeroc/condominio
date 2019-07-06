<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Miembros]].
 *
 * @see Miembros
 */
class MiembrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Miembros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Miembros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
