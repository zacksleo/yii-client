<?php

use yii\helpers\Html;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\Client */

$this->title = Module::t('client', 'Update', [
    'modelClass' => 'Client',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('client', 'Update');
?>
<div class="ad-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
