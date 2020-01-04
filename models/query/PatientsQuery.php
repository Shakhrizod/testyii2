<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Patients]].
 *
 * @see \app\models\Patients
 */
class PatientsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Patients[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Patients|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
