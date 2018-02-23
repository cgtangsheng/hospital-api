<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_bmi".
 *
 * @property integer $health_id
 * @property integer $height
 * @property integer $weight
 * @property integer $waist
 * @property integer $hip
 */
class UserBmi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_bmi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'height', 'weight', 'waist', 'hip'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'height' => 'Height',
            'weight' => 'Weight',
            'waist' => 'Waist',
            'hip' => 'Hip',
        ];
    }

    public function checkBmiInfo($param){
        $data = array();
        $bmi=0;
        if(isset($param["height"])&&isset($param["weight"])&&$param["height"]!=false && $param["weight"]!=false){
            $bmi=sprintf("%0.2f",floatval($param["weight"])/floatval($param["height"])*100/floatval($param["height"])*100);
        }
        $status = "normal";
        if($bmi<18){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"消瘦",
                "value"=>$bmi,
                "standard"=>"18~22.9"
            );
            $status="abnormal";
        }else if($bmi>=18 && $bmi<=22.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"体重正常",
                "value"=>$bmi,
                "standard"=>"18~22.9"
            );
        }else if($bmi>22.9 && $bmi<25){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"一般超重",
                "standard"=>"22.9~25",
                "value"=>$bmi,
            );
        }else if($bmi>=25 && $bmi<=29.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖前期",
                "standard"=>"25~29.9",
                "value"=>$bmi,
            );
            $status="abnormal";
        }
        else if($bmi>29.9 && $bmi<=34.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖I期",
                "standard"=>"29.9~34.9",
                "value"=>$bmi,
            );
            $status="abnormal";
        }
        else if($bmi>34.9 && $bmi<39.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖II期",
                "standard"=>"34.9~39.9",
                "value"=>$bmi,
            );
            $status="abnormal";
        }
        else if($bmi>39.9){
            $data[]=array(
                "label"=>"BMI",
                "desc"=>"肥胖II期",
                "standard"=>"大于39.9",
                "value"=>$bmi,
            );
            $status="abnormal";
        }
        if(isset($param["hip"])&&$param["hip"]!=false && $param["waist"]!=false){
            //$data["hip_waistline"]=sprintf("%0.2f",floatval($param["waistline"])/floatval($param["hip"]));
        }
        if(isset($param["sex"])&&isset($param["waist"])&&(isset($param["sex"])&&$param["sex"] == 0 && $param["waistline"]>85) || (isset($param["sex"])&&$param["sex"] == 1 && $param["waistline"]>80)){
            $data[]=array(
                "label"=>"腰围",
                "desc"=>"潜在向心型肥胖",
                "standard"=>"男>85cm,女>80cm",
                "value"=>$param["waist"],
            );
            $status="abnormal";
        }
        return array(
            "data"=>$data,
            "status"=>$status
        );
    }

    public function getBmiModel(){
        return array(
            "normal"=>array(
                "advice_text"=>"恭喜你拥有完美身材,请继续保持",
                "advice_goals"=>"我太崇拜你了,已经没啥可以建议的了",
            ),
            "abnormal"=>array(
                "advice_text"=>"体重bmi在18~22.9为正常范围,小于18为消瘦,大于22.9小于25为超重,大于或等于25以上为肥胖,\" +
                \"存在患脂肪肝等并发症疾病.建议每半年体检一次,并积极参加运动,控制热量摄入,控制体重的增加",
                "advice_goals"=>"BMI控制在18~22.9之间,腰臀比男性控制在85以下,女性控制在80以下",
            ),
        );
    }
}
