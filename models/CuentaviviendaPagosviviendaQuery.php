<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CuentaviviendaPagosvivienda]].
 *
 * @see CuentaviviendaPagosvivienda
 */
class CuentaviviendaPagosviviendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CuentaviviendaPagosvivienda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CuentaviviendaPagosvivienda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
