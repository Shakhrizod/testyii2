<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $familyname
 * @property int $category_id
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'familyname', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['firstname', 'lastname', 'familyname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'familyname' => 'Familyname',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\DoctorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DoctorsQuery(get_called_class());
    }
}
