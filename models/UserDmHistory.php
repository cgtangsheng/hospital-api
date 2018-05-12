<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_dm_history".
 *
 * @property integer $health_id
 * @property integer $is_ketoacidosis
 * @property integer $ketoacidosis_frequency
 * @property string $ketoacidosis_reason
 * @property integer $is_hypoglycemia
 * @property integer $hypoglycemia_frequency
 * @property string $hypoglycemia_reason
 * @property integer $hypoglycemia_severity
 * @property integer $is_cerebrovascular
 * @property integer $is_cardiovascular
 * @property integer $is_peripheral_vascular
 * @property integer $is_nephrosis
 * @property integer $is_fundus_lesions
 * @property integer $is_peripheral_neuropathy
 * @property integer $is_diabetic_foot
 * @property string $associated_diseases
 */
class UserDmHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_dm_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['health_id'], 'required'],
            [['health_id', 'is_ketoacidosis', 'ketoacidosis_frequency', 'is_hypoglycemia', 'hypoglycemia_frequency', 'hypoglycemia_severity', 'is_cerebrovascular', 'is_cardiovascular', 'is_peripheral_vascular', 'is_nephrosis', 'is_fundus_lesions', 'is_peripheral_neuropathy', 'is_diabetic_foot'], 'integer'],
            [['ketoacidosis_reason', 'hypoglycemia_reason', 'associated_diseases'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'health_id' => 'Health ID',
            'is_ketoacidosis' => 'Is Ketoacidosis',
            'ketoacidosis_frequency' => 'Ketoacidosis Frequency',
            'ketoacidosis_reason' => 'Ketoacidosis Reason',
            'is_hypoglycemia' => 'Is Hypoglycemia',
            'hypoglycemia_frequency' => 'Hypoglycemia Frequency',
            'hypoglycemia_reason' => 'Hypoglycemia Reason',
            'hypoglycemia_severity' => 'Hypoglycemia Severity',
            'is_cerebrovascular' => 'Is Cerebrovascular',
            'is_cardiovascular' => 'Is Cardiovascular',
            'is_peripheral_vascular' => 'Is Peripheral Vascular',
            'is_nephrosis' => 'Is Nephrosis',
            'is_fundus_lesions' => 'Is Fundus Lesions',
            'is_peripheral_neuropathy' => 'Is Peripheral Neuropathy',
            'is_diabetic_foot' => 'Is Diabetic Foot',
            'associated_diseases' => 'Associated Diseases',
        ];
    }
}
