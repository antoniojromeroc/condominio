<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CuentaviviendaPagosvivienda;

/**
 * CuentaviviendaPagosviviendaSearch represents the model behind the search form of `app\models\CuentaviviendaPagosvivienda`.
 */
class CuentaviviendaPagosviviendaSearch extends CuentaviviendaPagosvivienda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cuentavivienda_id', 'pagosvivienda_id'], 'integer'],
            [['montopagado'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CuentaviviendaPagosvivienda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cuentavivienda_id' => $this->cuentavivienda_id,
            'pagosvivienda_id' => $this->pagosvivienda_id,
            'montopagado' => $this->montopagado,
        ]);

        return $dataProvider;
    }
}
