<?php

use borales\extensions\phoneInput\PhoneInput;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Patients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patients-form">

    <?php $form = ActiveForm::begin([
            'action' => '/patients/create'
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'familyname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'birthdate')->textInput(); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'sex')->dropDownList([
                'Мужской' => 'Мужской',
                'Женский' => 'Женский',
            ], ['prompt' => 'Выберите пол пациента']); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tel')->widget(PhoneInput::className(), [
                'jsOptions' => [
                    'preferredCountries' => ['uz'],
                ]
            ]); ?>
        </div>
    </div>
    <?= $form->field($model, 'direction')->checkbox() ?>
    <div id="doctors">
        <?= $form->field($model, 'doctor_id')->dropDownList(
            ArrayHelper::map(\app\models\Doctors::find()->select(['id', 'firstname', 'lastname', 'familyname'])->asArray()->all(), 'id', function($data) {

                return $data['firstname'].' '.$data['lastname'].' '.$data['familyname'];

            }),
                ['prompt' => '---']) ?>
    </div>
    <!--    --><? //= $form->field($model, 'doctor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>

        <?= Html::button('Закрыть', ['class' => 'btn btn-default', 'onclick' => '$(\'#add_patient\').modal(\'hide\');']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<style>

</style>
</div>