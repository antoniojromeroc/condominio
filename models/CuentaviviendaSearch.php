<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuentavivienda;

/**
 * CuentaviviendaSearch represents the model behind the search form of `app\models\Cuentavivienda`.
 */
class CuentaviviendaSearch extends Cuentavivienda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'viviendas_id', 'tipoobligaciones_id', 'mes', 'anio', 'cerrada'], 'integer'],
            [['descripcion', 'fecha_vencimiento'], 'safe'],
            [['monto', 'monto_faltante'], 'number'],
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
        $query = Cuentavivienda::find();

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
            'tipoobligaciones_id' => $this->tipoobligaciones_id,
            'mes' => $this->mes,
            'anio' => $this->anio,
            'monto' => $this->monto,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'monto_faltante' => $this->monto_faltante,
            'cerrada' => $this->cerrada,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
