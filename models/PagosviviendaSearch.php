<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagosvivienda;

/**
 * PagosviviendaSearch represents the model behind the search form of `app\models\Pagosvivienda`.
 */
class PagosviviendaSearch extends Pagosvivienda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viviendas_id', 'bancoemisor_id', 'bancoreceptor_id'], 'integer'],
            [['monto'], 'number'],
            [['num_operacion', 'num_cuenta', 'fecha_deposito', 'fecha_disponible'], 'safe'],
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
        $query = Pagosvivienda::find();

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
            'viviendas_id' => $this->viviendas_id,
            'monto' => $this->monto,
            'bancoemisor_id' => $this->bancoemisor_id,
            'bancoreceptor_id' => $this->bancoreceptor_id,
            'fecha_deposito' => $this->fecha_deposito,
            'fecha_disponible' => $this->fecha_disponible,
        ]);

        $query->andFilterWhere(['like', 'num_operacion', $this->num_operacion])
            ->andFilterWhere(['like', 'num_cuenta', $this->num_cuenta]);

        return $dataProvider;
    }
}
