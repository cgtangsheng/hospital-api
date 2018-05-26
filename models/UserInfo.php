<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\components\HttpHelper;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $health_id
 * @property string $name
 * @property integer $sex
 * @property integer $age
 * @property string $work
 * @property integer $height
 * @property integer $weight
 * @property string $pressure
 * @property string $creat_time
 * @property string $birthday
 * @property string $identify
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'age', 'height', 'weight'], 'integer'],
//            [['create_time'],'safe'],
            [['name', 'work','identify','tel','birthday'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => '健康档案号',
            'name' => '姓名',
            'sex' => '性别',
            'age' => '年龄',
            'work' => '职业',
            'height' => '身高',
            'weight' => '体重',
            'create_time' => '录入时间',
            'identify'=>'身份证号',
            'tel'=>'电话',
            'birthday'=>"生日",
        ];
    }
//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => 'create_time',
//                ],
//            ],
//        ];
//    }

    public function getUserInfo($health_id){
        return UserInfo::find()->where(['health_id'=>$health_id])->one();
    }

    public function saveWXUserInfo($input){

        $openid = $input["openid"];
        $access_token = $input["access_token"];
        $url = sprintf("%s/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN",Yii::$app->params["wxUrl"],$access_token,$openid);
        $res = HttpHelper::httpRequest($url, "GET", array());
        if ($res == false) {
            $response["errcode"] = -2;
            $response["errmsg"] = "get access token fail";
            Yii::$app->response->data = $response;
            return;
        }
        $resData = json_decode($res,true);
        $health_id = intval($input["health_id"]);
        $sex = intval($resData["sex"]);
        $nickname = strval($resData["nickname"]);
        $province = strval($resData["province"]);
        $country = strval($resData["country"]);
        $city = strval($resData["city"]);
        $headimg  = strval($resData["headimgurl"]);
        $sql = "select * from user_info where health_id=:id";
        $res = Yii::$app->db->createCommand($sql)->bindParam(":id",$resData["id"])->queryOne();
        if($res == false){
            Yii::$app->db->createCommand()->insert("user_info",[
                'health_id'=>$health_id,
                'sex'=>$sex,
                'nickname'=>$nickname,
                'province'=>$province,
                'country'=>$country,
                'city'=>$city,
                'headimg'=>$headimg
            ])->execute();
        }else{
             Yii::$app->db->createCommand()->update("user_info",[
                'sex'=>$sex,
                'nickname'=>$nickname,
                'province'=>$province,
                'city'=>$city,
                'country'=>$country,
                'headimg'=>$headimg
            ],"health_id>$health_id")->execute();
        }
    }
}
