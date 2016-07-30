<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RecipeHasInput;

/**
 * RecipeHasInputSearch represents the model behind the search form about `app\models\RecipeHasInput`.
 */
class RecipeHasInputSearch extends RecipeHasInput
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPreparedInput', 'idInput'], 'integer'],
            [['quantity'], 'number'],
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
        $query = RecipeHasInput::find();

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
            'idPreparedInput' => $this->idPreparedInput,
            'idInput' => $this->idInput,
            'quantity' => $this->quantity,
        ]);

        return $dataProvider;
    }
}
