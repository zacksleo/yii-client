<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zacksleo\yii2\client\Module;
use zacksleo\yii2\client\models\ClientRelease;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\client\models\AdPosition */

\yii\web\YiiAsset::register($this);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'Clients'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('client', 'ClientReleases'), 'url' => ['index', 'slug' => $model->adPosition->slug]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('client', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('client', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'img',
                'value' => function ($model) {
                    return $model->getImg();
                },
                'format' => ['image', ['width' => '100', 'height' => '100']],
            ],
            'url',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Ad::getStatusList()[$model->status];
                }
            ],
        ],
    ]) ?>

</div>
