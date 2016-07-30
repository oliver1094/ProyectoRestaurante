<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Presentation;

/**
 * PresentationSearch represents the model behind the search form about `app\models\Presentation`.
 */
class PresentationSearch extends Presentation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPresentation', 'idGroup', 'idInput'], 'integer'],
            [['description', 'provider', 'status', 'location'], 'safe'],
            [['lastCost', 'averageCost', 'iva', 'costWithTaxes', 'performance', 'minimumStock', 'maximumStock'], 'number'],
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
        $query = Presentation::find();

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
            'idPresentation' => $this->idPresentation,
            'lastCost' => $this->lastCost,
            'averageCost' => $this->averageCost,
            'iva' => $this->iva,
            'costWithTaxes' => $this->costWithTaxes,
            'performance' => $this->performance,
            'minimumStock' => $this->minimumStock,
            'maximumStock' => $this->maximumStock,
            'idGroup' => $this->idGroup,
            'idInput' => $this->idInput,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'provider', $this->provider])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
