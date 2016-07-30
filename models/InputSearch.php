<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Input;

/**
 * InputSearch represents the model behind the search form about `app\models\Input`.
 */
class InputSearch extends Input
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idInput', 'stockable', 'idGroup', 'idUnit'], 'integer'],
            [['description'], 'safe'],
            [['lastCost', 'averageCost', 'iva', 'costWithTax', 'wasteRate', 'lastCostWaste'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Input::find();

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
            'idInput' => $this->idInput,
            'lastCost' => $this->lastCost,
            'averageCost' => $this->averageCost,
            'iva' => $this->iva,
            'costWithTax' => $this->costWithTax,
            'stockable' => $this->stockable,
            'wasteRate' => $this->wasteRate,
            'lastCostWaste' => $this->lastCostWaste,
            'idGroup' => $this->idGroup,
            'idUnit' => $this->idUnit,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
