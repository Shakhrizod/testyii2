<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PatientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'fullName')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Patients::find()->select(['firstname'])->asArray()->all(), 'firstname', 'firstname'),
                'options' => ['placeholder' => 'Выберите пациента ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'doctor_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(\app\models\Doctors::find()->select(['id', 'firstname', 'lastname', 'familyname'])->asArray()->all(), 'id', function ($data) {

                    return $data['firstname'] . ' ' . $data['lastname'] . ' ' . $data['familyname'];

                }),
                'options' => ['placeholder' => 'Выберите доктора ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'direction')->checkbox() ?>
        </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i> Поиск', ['class' => 'btn btn-success btn-md']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
