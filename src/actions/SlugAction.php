<?php

namespace zacksleo\yii2\client\actions;

use yii\base\Action;
use zacksleo\yii2\client\models\Client;
use zacksleo\yii2\client\models\ClientRelease;

class SlugAction extends Action
{
    public $slug;

    public function run()
    {
        if (($client = Client::findOne(['slug' => $this->slug, 'status' => AdPosition::STATUS_ACTIVE])) == null) {
            return [];
        }
        return ClientRelease::find()->orderBy('created_at DESC')
            ->where(
                [
                    'client_id' => $client->id,
                ]
            )
            ->all();
    }
}
