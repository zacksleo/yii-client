<?php

use yii\helpers\Html;
use yii\grid\GridView;
use zacksleo\yii2\client\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('client', 'Clients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('client', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'slug',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model::getStatusList()[$model->status];
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {list} {update} {delete}',
                'buttons' => [
                    'list' => function ($url, $model, $key) {
                        $url = \yii\helpers\Url::to(['client-release/index', 'slug' => $model->slug]);
                        return Html::a("<span class=\"glyphicon glyphicon-list\"></span>", $url, [
                            'title' => '发布列表'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
