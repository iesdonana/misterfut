<?php

use app\assets\AppAsset;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jugador */
/* @var $form yii\widgets\ActiveForm */

AppAsset::register($this);
?>

<div class="jugador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_nac')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Introduzca la fecha de nacimiento'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
        ]
    ]); ?>

    <?= $form->field($model, 'dorsal')->input('number') ?>

    <?= $form->field($model, 'id_posicion')->widget(Select2::classname(), [
            'data' => $posiciones,
            'options' => ['placeholder' => 'Posición'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <?php if (!$model->isNewRecord) { ?>
        <?= $form->field($model, 'esta_lesionado')->checkbox() ?>

        <?= $form->field($model, 'tiempo_lesion')->textInput(['maxlength' => true]) ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Añadir' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
