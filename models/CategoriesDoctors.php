<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories_doctors".
 *
 * @property int $id
 * @property string $category
 */
class CategoriesDoctors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories_doctors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CategoriesDoctorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CategoriesDoctorsQuery(get_called_class());
    }
}
