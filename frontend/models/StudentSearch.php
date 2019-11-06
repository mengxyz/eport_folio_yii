<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Student;

/**
 * StudentSearch represents the model behind the search form of `frontend\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id', 'c_id'], 'integer'],
            [['std_name', 'std_address', 'std_tel', 'std_pic', 'pa_id'], 'safe'],
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
        $query = Student::find();

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
            'std_id' => $this->std_id,
            'c_id' => $this->c_id,
        ]);

        $query->andFilterWhere(['like', 'std_name', $this->std_name])
            ->andFilterWhere(['like', 'std_address', $this->std_address])
            ->andFilterWhere(['like', 'std_tel', $this->std_tel])
            ->andFilterWhere(['like', 'std_pic', $this->std_pic])
            ->andFilterWhere(['like', 'pa_id', $this->pa_id]);

        return $dataProvider;
    }
}
