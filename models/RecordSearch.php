<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Record;
use app\models\UserInfo;

/**
 * RecordSearch represents the model behind the search form about `app\models\Record`.
 */
class RecordSearch extends Record
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'health_id'], 'integer'],
            [['examined_hospital', 'diagnosis', 'diagnosis_hospital', 'medication', 'department', 'medication_hospital', 'creat_time'], 'safe'],
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
        $query = Record::find();

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
            'health_id' => $this->health_id,
            'creat_time' => $this->creat_time,
        ]);

        $query->andFilterWhere(['like', 'examined_hospital', $this->examined_hospital])
            ->andFilterWhere(['like', 'diagnosis', $this->diagnosis])
            ->andFilterWhere(['like', 'diagnosis_hospital', $this->diagnosis_hospital])
            ->andFilterWhere(['like', 'medication', $this->medication])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'medication_hospital', $this->medication_hospital]);

        return $dataProvider;
    }
}
