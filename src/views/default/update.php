<?php

use yii\helpers\Html;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\Client */

$this->title = Module::t('ad', 'Update', [
    'modelClass' => 'Client',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('ad', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('ad', 'Update');
?>
<div class="ad-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
