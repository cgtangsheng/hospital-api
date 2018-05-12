<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_other".
 *
 * @property integer $health_id
 * @property integer $high_blood_pressure
 * @property integer $low_blood_pressure
 * @property double $hbalc
 * @property double $tg
 * @property double $tc
 * @property double $ldl_c
 * @property double $hdl_c
 * @property string $create_time
 */
class DmOther extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_other';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'high_blood_pressure', 'low_blood_pressure'], 'integer'],
            [['hbalc', 'tg', 'tc', 'ldl_c', 'hdl_c'], 'number'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'high_blood_pressure' => 'High Blood Pressure',
            'low_blood_pressure' => 'Low Blood Pressure',
            'hbalc' => 'Hbalc',
            'tg' => 'Tg',
            'tc' => 'Tc',
            'ldl_c' => 'Ldl C',
            'hdl_c' => 'Hdl C',
            'create_time' => 'Create Time',
        ];
    }
}
