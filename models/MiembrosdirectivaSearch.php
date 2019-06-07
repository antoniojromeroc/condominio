<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Miembrosdirectiva;

/**
 * MiembrosdirectivaSearch represents the model behind the search form of `app\models\Miembrosdirectiva`.
 */
class MiembrosdirectivaSearch extends Miembrosdirectiva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'directiva_id', 'miembros_id', 'cargos_id'], 'integer'],
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
        $query = Miembrosdirectiva::find();

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
            'directiva_id' => $this->directiva_id,
            'miembros_id' => $this->miembros_id,
            'cargos_id' => $this->cargos_id,
        ]);

        return $dataProvider;
    }
}
