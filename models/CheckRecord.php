<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "check_record".
 *
 * @property integer $health_id
 * @property integer $height
 * @property integer $weight
 * @property integer $waist
 * @property integer $hip
 * @property integer $diet
 * @property integer $motion
 */
class CheckRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'height', 'weight', 'waist', 'hip', 'diet', 'motion'], 'integer'],
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
            'diet' => 'Diet',
            'motion' => 'Motion',
        ];
    }
}
