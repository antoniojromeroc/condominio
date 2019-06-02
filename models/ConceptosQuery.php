<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Conceptos]].
 *
 * @see Conceptos
 */
class ConceptosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Conceptos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Conceptos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
