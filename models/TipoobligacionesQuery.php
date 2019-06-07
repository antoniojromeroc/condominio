<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tipoobligaciones]].
 *
 * @see Tipoobligaciones
 */
class TipoobligacionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tipoobligaciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tipoobligaciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
