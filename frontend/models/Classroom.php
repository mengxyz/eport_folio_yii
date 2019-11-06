<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "classroom".
 *
 * @property int $c_id รหัสชั้นเรยน
 * @property string $c_name ชื่อชั้นเรยน
 * @property int $std_id หัวหน้าห้อง
 * @property int $t_id อาจารย์
 */
class Classroom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['c_name'], 'required'],
            [['std_id', 't_id'], 'integer'],
            [['c_name'], 'string', 'max' => 30],
            [['c_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'รหัสชั้นเรยน',
            'c_name' => 'ชื่อชั้นเรยน',
            'std_id' => 'หัวหน้าห้อง',
            't_id' => 'อาจารย์',
        ];
    }
}
