<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property integer $id
 * @property integer $health_id
 * @property string $examined_hospital
 * @property string $diagnosis
 * @property string $diagnosis_hospital
 * @property string $medication
 * @property string $department
 * @property string $medication_hospital
 * @property string $creat_time
 */
class Record extends \yii\db\ActiveRecord
{

    public $name = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'integer'],
            [['creat_time'], 'safe'],
            [['examined_hospital', 'diagnosis_hospital', 'medication_hospital'], 'string', 'max' => 50],
            [['diagnosis'], 'string', 'max' => 200],
            [['medication'], 'string', 'max' => 150],
            [['department'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'health_id' => '健康档案号',
            'examined_hospital' => '检查医院',
            'diagnosis' => '诊断',
            'diagnosis_hospital' => '确诊医院',
            'medication' => '用药情况',
            'department' => '就诊科室',
            'medication_hospital' => '用药医院',
            'creat_time' => '就诊时间',
        ];
    }

    public function getName($health_id){
        $model = new UserInfo();
        if($health_id==null){
            $userInfo = $model->getUserInfo($this->health_id);
        }else{
            $userInfo = $model->getUserInfo($health_id);
        }
        return $userInfo->name;
    }
}
