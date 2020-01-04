<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patients".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $familyname
 * @property string $birthdate
 * @property string $sex
 * @property string $tel
 * @property int $direction
 * @property int|null $doctor_id
 */
class Patients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'familyname', 'birthdate', 'sex', 'tel', 'direction'], 'required'],
            [['birthdate'], 'safe'],
            [['direction', 'doctor_id'], 'integer'],
            [['firstname', 'lastname', 'familyname', 'sex', 'tel'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'familyname' => 'Отчество',
            'birthdate' => 'Дата рождения',
            'sex' => 'Пол',
            'tel' => 'Мобильный телефон',
            'direction' => 'С направлением',
            'doctor_id' => 'Доктор',
            'fullName' => 'ФИО'
        ];
    }
    public function getDoctor()
    {
        return $this->hasOne(Doctors::className(), ['id' => 'doctor_id']);
    }
    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname. ' ' . $this->familyname;
    }
    /**
     * {@inheritdoc}
     * @return \app\models\query\PatientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PatientsQuery(get_called_class());
    }
}
