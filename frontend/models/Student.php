<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $std_id รหัสนักเรียน
 * @property string $std_name ชื่อนักเรียน
 * @property string $std_address ที่อยู่
 * @property string $std_tel เบอร์โทร
 * @property string $std_pic รูป
 * @property string $pa_id ผู้ปกครอง
 * @property int $c_id ชั้นเรียน
 */
class Student extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_name', 'std_address', 'std_tel'], 'required'],
            [['c_id'], 'integer'],
            [['std_name'], 'string', 'max' => 30],
            [['std_address', 'std_pic'], 'string', 'max' => 50],
            [['std_tel'], 'string', 'max' => 10],
            [['pa_id'], 'string', 'max' => 13],
            [['std_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_id' => 'รหัสนักเรียน',
            'std_name' => 'ชื่อนักเรียน',
            'std_address' => 'ที่อยู่',
            'std_tel' => 'เบอร์โทร',
            'std_pic' => 'รูป',
            'pa_id' => 'ผู้ปกครอง',
            'c_id' => 'ชั้นเรียน',
        ];
    }

    public function getclassroomName()
    {
        return $this->hasOne(Classroom::className(),['c_id'=>'c_id']);
    }
}
