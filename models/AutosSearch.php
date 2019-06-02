<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autos;

/**
 * AutosSearch represents the model behind the search form of `app\models\Autos`.
 */
class AutosSearch extends Autos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'personas_id'], 'integer'],
            [['num_placa', 'marca', 'modelo', 'anio', 'color', 'codigo'], 'safe'],
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
        $query = Autos::find();

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
            'personas_id' => $this->personas_id,
        ]);

        $query->andFilterWhere(['like', 'num_placa', $this->num_placa])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'anio', $this->anio])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'codigo', $this->codigo]);

        return $dataProvider;
    }
}
