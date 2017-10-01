<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Address */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'fias_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'house')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
