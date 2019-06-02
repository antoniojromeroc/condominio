<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingresosegresos;

/**
 * IngresosegresosSearch represents the model behind the search form of `app\models\Ingresosegresos`.
 */
class IngresosegresosSearch extends Ingresosegresos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'conceptos_id'], 'integer'],
            [['descripcion', 'fecha'], 'safe'],
            [['monto'], 'number'],
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
        $query = Ingresosegresos::find();

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
            'conceptos_id' => $this->conceptos_id,
            'fecha' => $this->fecha,
            'monto' => $this->monto,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
