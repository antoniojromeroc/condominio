<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cuentavivienda]].
 *
 * @see Cuentavivienda
 */
class CuentaviviendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Cuentavivienda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Cuentavivienda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
