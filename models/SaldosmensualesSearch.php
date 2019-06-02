<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Saldosmensuales;

/**
 * SaldosmensualesSearch represents the model behind the search form of `app\models\Saldosmensuales`.
 */
class SaldosmensualesSearch extends Saldosmensuales
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'anio', 'mes'], 'integer'],
            [['monto_ingresos', 'monto_egresos', 'saldo'], 'number'],
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
        $query = Saldosmensuales::find();

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
            'anio' => $this->anio,
            'mes' => $this->mes,
            'monto_ingresos' => $this->monto_ingresos,
            'monto_egresos' => $this->monto_egresos,
            'saldo' => $this->saldo,
        ]);

        return $dataProvider;
    }
}
