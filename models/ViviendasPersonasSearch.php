<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ViviendasPersonas;

/**
 * ViviendasPersonasSearch represents the model behind the search form of `app\models\ViviendasPersonas`.
 */
class ViviendasPersonasSearch extends ViviendasPersonas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viviendas_id', 'personas_id'], 'integer'],
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
        $query = ViviendasPersonas::find();

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
            'personas_id' => $this->personas_id,
        ]);

        return $dataProvider;
    }
}
