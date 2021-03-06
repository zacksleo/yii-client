<?php

use yii\helpers\Html;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\AdPosition */

$this->title = Module::t('client', 'Update ', [
        'modelClass' => 'Client',
    ]) . $model->version;
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->version, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Update');
?>
<div class="ad-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
