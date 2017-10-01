<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Address */

$this->title = Yii::t('backend', 'Create Address');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
