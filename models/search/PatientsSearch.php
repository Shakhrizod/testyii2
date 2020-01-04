<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patients;

/**
 * PatientsSearch represents the model behind the search form of `app\models\Patients`.
 */
class PatientsSearch extends Patients
{
    public $fullName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'direction', 'doctor_id'], 'integer'],
            [['firstname', 'lastname', 'familyname', 'birthdate', 'sex', 'tel', 'created_date','fullName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Patients::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'fullName' => [
                    'asc' => ['firstname' => SORT_ASC, 'lastname' => SORT_ASC, 'familyname' => SORT_ASC],
                    'desc' => ['firstname' => SORT_DESC, 'lastname' => SORT_DESC, 'familyname' => SORT_DESC],
                    'label' => 'Full Name',
                    'default' => SORT_ASC
                ],
            ]
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthdate' => $this->birthdate,
            'direction' => $this->direction,
            'doctor_id' => $this->doctor_id,
            'created_date' => $this->created_date,
        ]);
        $query->andWhere('firstname LIKE "%' . $this->fullName . '%" ' . //This will filter when only first name is searched.
            'OR lastname LIKE "%' . $this->fullName . '%" '. //This will filter when only last name is searched.
            'OR familyname LIKE "%' . $this->fullName . '%" '. //This will filter when only last name is searched.
            'OR CONCAT(firstname, " ", lastname, " ", familyname) LIKE "%' . $this->fullName . '%"' //This will filter when full name is searched.
        );
        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'familyname', $this->familyname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'tel', $this->tel]);

        return $dataProvider;
    }
}
