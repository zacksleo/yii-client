<?php

use yii\helpers\Html;
use yii\grid\GridView;
use zacksleo\yii2\client\Module;
use zacksleo\yii2\client\models\ClientRelease;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = ['label' => '应用列表', 'url' => \yii\helpers\Url::to(['default/index'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-index">

    <p>
        <?= Html::a(Module::t('client', 'Create'), ['create', 'slug' => $_GET['slug']], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'version',
            [
                'attribute' => 'client_id',
                'value' => 'client.name'
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return ClientRelease::getStatusList()[$model->status];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
