<?php

/* @var $this yii\web\View */

use kartik\grid\GridView as Gri;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Картотека</a></li>
        <li><a data-toggle="tab" href="#menu1">Приеми</a></li>
        <li><a data-toggle="tab" href="#menu2">Доктори</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?php
            echo Gri::widget([
                'id' => 'kv-grid-demo',
                'dataProvider' => $patientsDataProvider,
                'filterModel' => $patientsSearch,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],

                    'fullName',
                    'birthdate',
                    [
                        'attribute' => 'sex',
                        'value' => 'sex',
                        'filter' => [
                            'Мужской' => 'Мужской',
                            'Женский' => 'Женский',
                        ],
                    ],

                    'tel',
                    'created_date',
                    [
                        'class' => 'kartik\grid\ActionColumn',
//                        'dropdown' => true,
//                        'dropdownOptions' => ['class' => 'float-right'],
//                        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
//                        'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
//                        'updateOptions' => ['title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
//                        'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
//                        'headerOptions' => ['class' => 'kartik-sheet-style'],
                    ]
                ], // check the configuration for grid columns by clicking button above


                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' => [
                    [
                        'content' =>
                            '<ul style="    display: inline-flex; list-style: none;">' . '<li>' .
                            Html::button('<i class="glyphicon glyphicon-plus"></i> Добавить пациента', [
                                'class' => 'btn btn-success',
                                'onclick' => '$(\'#add_patient\').modal(\'show\');'
                            ]) . '</li><li style="margin-left: 4px;">' .
                            Html::a('Записать на прием', ['#'], [
                                'class' => 'btn btn-info',
                                'data-pjax' => 0,
                            ]) . '</li></ul>',
                        'options' => ['class' => 'btn-group mr-2']
                    ],

                    '{toggleData}',
                ],
                'toggleDataContainer' => ['class' => 'btn-group mr-2'],
                // set export properties
                'export' => [
                    'fontAwesome' => true
                ],
                // parameters from the demo form
                'bordered' => true,
                'striped' => true,
//                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'panel' => [
                    'type' => Gri::TYPE_SUCCESS,

                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>  Пациенты</h3>',
                    'after' => false

                ],
                'persistResize' => false,
                'toggleDataOptions' => ['minCount' => 10],

            ]);
            ?>
            <?php
            Modal::begin([
                'header' => '<h2>Добавить поциента</h2>',
                'id' => 'add_patient',
                'size' => "modal-lg",
            ]);
            ?>
            <?= $this->render('_form', [
                'model' => $modelPatients,
            ]) ?>

            <?php Modal::end(); ?>
        </div>
        <div id="menu1" class="tab-pane fade">
            <?php Pjax::begin(); ?>
            <?php  echo $this->render('_search', ['model' => $patientsSearch]); ?>

            <?= \yii\grid\GridView::widget([
                'dataProvider' => $patientsDataProvider,
                'filterModel' => $patientsSearch,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'fullName',

                    'birthdate',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Some content in menu 2.</p>
        </div>
    </div>
    <?= Html::a('<i class="glyphicon glyphicon-refresh"></i>',['/'], ['class' => 'btn btn-primary btn-md']) ?>

</div>
<script>

</script>