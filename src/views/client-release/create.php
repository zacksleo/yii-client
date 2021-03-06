<?php

use yii\helpers\Html;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\AdPosition */

$this->title = Module::t('client-releases', 'Create');
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'ClientReleases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
