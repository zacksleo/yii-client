<?php

use yii\helpers\Html;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\Client */

$this->title = Module::t('client', 'Create');
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'Ad Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
