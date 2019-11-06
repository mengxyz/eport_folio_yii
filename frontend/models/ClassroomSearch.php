<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Classroom;

/**
 * ClassroomSearch represents the model behind the search form of `frontend\models\Classroom`.
 */
class ClassroomSearch extends Classroom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_id', 'std_id', 't_id'], 'integer'],
            [['c_name'], 'safe'],
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
        $query = Classroom::find();

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
            'c_id' => $this->c_id,
            'std_id' => $this->std_id,
            't_id' => $this->t_id,
        ]);

        $query->andFilterWhere(['like', 'c_name', $this->c_name]);

        return $dataProvider;
    }
}
