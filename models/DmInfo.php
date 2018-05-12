<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_info".
 *
 * @property integer $health_id
 * @property integer $is_diabetes
 * @property double $fasting_blood_glucose
 * @property double $postprandial_blood_glucose
 * @property double $anytime_blood_glucose
 * @property string $diagnose_hospital
 * @property string $diagnose_time
 * @property string $update_time
 */
class DmInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'is_diabetes'], 'integer'],
            [['fasting_blood_glucose', 'postprandial_blood_glucose', 'anytime_blood_glucose'], 'number'],
            [['diagnose_time', 'update_time'], 'safe'],
            [['diagnose_hospital'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'is_diabetes' => 'Is Diabetes',
            'fasting_blood_glucose' => 'Fasting Blood Glucose',
            'postprandial_blood_glucose' => 'Postprandial Blood Glucose',
            'anytime_blood_glucose' => 'Anytime Blood Glucose',
            'diagnose_hospital' => 'Diagnose Hospital',
            'diagnose_time' => 'Diagnose Time',
            'update_time' => 'Update Time',
        ];
    }
}
