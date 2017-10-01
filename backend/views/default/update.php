<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Address */

$this->title = Yii::t('backend', 'Update Address') . ' ' . $model->city;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="address-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
