<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'password', 'authKey', 'accessToken'], 'safe'],
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
        $query = User::find();

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
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken]);

        return $dataProvider;
    }

    public function getUserInfo($id){
        $result = array();
        $sql = "select * from user left join user_info on user.id = user_info.health_id where id = :id";
        $res = Yii::$app->db->createCommand($sql)->bindParam(":id",$id)->queryOne();
        if($res==false){
             $result["user"]=array();
        }else{
            $result["user"]=$res;
        }
        $sql = "select * from record where health_id=:id";
        $res = Yii::$app->db->createCommand($sql)->bindParam(":id",$id)->queryAll();
        if($res==false){
            $result["record"]=array();
        }else{
            $result["record"]=$res;
        }
        return $result;
    }
}
