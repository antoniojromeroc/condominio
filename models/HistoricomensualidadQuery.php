<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Historicomensualidad]].
 *
 * @see Historicomensualidad
 */
class HistoricomensualidadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Historicomensualidad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Historicomensualidad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
