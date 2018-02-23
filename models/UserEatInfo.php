<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_eat_info".
 *
 * @property integer $health_id
 * @property double $staple_food
 * @property integer $work_type
 * @property double $vegetables
 * @property double $milk
 * @property integer $egg
 * @property double $meet
 * @property double $bean
 * @property double $oil
 * @property double $salt
 * @property integer $sports_type
 * @property integer $sports_intensity
 * @property integer $sports_time
 * @property integer $sports_frequency
 * @property integer $is_smoke
 * @property integer $smoke_num
 * @property integer $is_drink
 * @property integer $drink_num
 * @property integer $high_blood_pressure
 * @property integer $low_blood_pressure
 * @property integer $blood_pressure_addr
 */
class UserEatInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_eat_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'work_type', 'egg', 'sports_type', 'sports_intensity', 'sports_time', 'sports_frequency', 'is_smoke', 'smoke_num', 'is_drink', 'drink_num', 'high_blood_pressure', 'low_blood_pressure', 'blood_pressure_addr'], 'integer'],
            [['staple_food', 'vegetables', 'milk', 'meet', 'bean', 'oil', 'salt'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'staple_food' => 'Staple Food',
            'work_type' => 'Work Type',
            'vegetables' => 'Vegetables',
            'milk' => 'Milk',
            'egg' => 'Egg',
            'meet' => 'Meet',
            'bean' => 'Bean',
            'oil' => 'Oil',
            'salt' => 'Salt',
            'sports_type' => 'Sports Type',
            'sports_intensity' => 'Sports Intensity',
            'sports_time' => 'Sports Time',
            'sports_frequency' => 'Sports Frequency',
            'is_smoke' => 'Is Smoke',
            'smoke_num' => 'Smoke Num',
            'is_drink' => 'Is Drink',
            'drink_num' => 'Drink Num',
            'high_blood_pressure' => 'High Blood Pressure',
            'low_blood_pressure' => 'Low Blood Pressure',
            'blood_pressure_addr' => 'Blood Pressure Addr',
        ];
    }

    public function checkDietInfo($param){
        $data = array();
        $diet_desc = array();
        if(isset($param["work_density"])){
            switch ($param["work_density"]){
                case 0:
                    if(isset($param["diet"])&&$param["diet"]>5){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"轻体力劳动每日摄入标准4~5两",
                            "value"=>floatval($param["diet"]),
                        );
                    }
                    break;
                case 1:
                    if(isset($param["diet"])&&$param["diet"]>6){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"轻体力劳动每日摄入标准5~6两",
                            "value"=>floatval($param["diet"]),
                        );
                    }
                    break;
                case 2:
                    if(isset($param["diet"])&&$param["diet"]>8){
                        $diet_desc[]=array(
                            "label"=>"主食",
                            "desc"=>"主食太多",
                            "standard"=>"中体力劳动每日摄入标准6~8两",
                            "value"=>floatval($param["diet"]),

                        );
                    }
                    break;
            }
        }
        if(isset($param["vegetables"])&&$param["vegetables"]<10){
            $diet_desc[]=array(
                "label"=>"蔬菜",
                "desc"=>"蔬菜摄入太少",
                "standard"=>"一市斤以上",
                "value"=>floatval($param["vegetables"]),
            );
        }
        if(isset($param["milk"])&&$param["milk"]<250){
            $diet_desc[]=array(
                "label"=>"牛奶",
                "desc"=>"牛奶摄入太少",
                "standard"=>"250ml",
                "value"=>floatval($param["milk"]),
            );
        }
        if(isset($param["egg"])&&$param["egg"]<1){
            $diet_desc[]=array(
                "label"=>"蛋类",
                "desc"=>"蛋类摄入太少",
                "standard"=>"1个",
                "value"=>intval($param["egg"]),
            );
        }
        if(isset($param["meet"])&&$param["meet"]!=false&&$param["meet"]<2){
            $diet_desc[]=array(
                "label"=>"瘦肉",
                "desc"=>"瘦肉摄入太少",
                "standard"=>"2两",
                "value"=>floatval($param["meet"]),
            );
        }
        if(isset($param["bean"])&&$param["bean"]!=false&&$param["bean"]<1){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太少",
                "standard"=>"1~2两",
                "value"=>floatval($param["bean"]),
            );
        }elseif(isset($param["bean"])&&$param["bean"]>2){
            $diet_desc[]=array(
                "label"=>"豆制品",
                "desc"=>"豆制品摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>floatval($param["bean"]),
            );
        }
        if(isset($param["oil"])&&$param["oil"]>3){
            $diet_desc[]=array(
                "label"=>"食用油",
                "desc"=>"食用油摄入太多",
                "standard"=>"2~3汤匙",
                "value"=>floatval($param["oil"]),
            );
        }
        if(isset($param["salt"])&&$param["salt"]>6){
            $diet_desc[]=array(
                "label"=>"食盐",
                "desc"=>"盐摄入太多",
                "standard"=>"每日摄入标准不超过g",
                "value"=>floatval($param["salt"]),
            );
        }
        return $diet_desc;
    }

    public function checkSportInfo($param){
        $data = array();
        if(isset($param["sports_time"])&&$param["sports_time"]<150){
            $data[]=array(
                "label"=>"有氧运动",
                "desc"=>"有氧运动时间太少",
                "value"=>$this->floatParam($param,"sports_time"),
                "standard"=>">150分钟"
            );
        }
        return $data;
    }
    private function floatParam($data,$index){
        if(!isset($data[$index])){
            return 0.0;
        }else{
            return floatval($data[$index]);
        }
    }
}
