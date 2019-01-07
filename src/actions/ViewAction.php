<?php

namespace zacksleo\yii2\client\actions;

use yii\base\Action;
use zacksleo\yii2\client\models\Client;
use zacksleo\yii2\client\models\ClientRelease;

class ViewAction extends Action
{
    public $slug;
    public $version;

    public function run()
    {
        if (($client = Client::findOne(['slug' => $this->slug, 'status' => Client::STATUS_ACTIVE])) == null) {
            return [];
        }
        return ClientRelease::find()->orderBy('created_at DESC')
            ->where(
                [
                    'client_id' => $client->id,
                    'version' => $this->version
                ]
            )
            ->one();
    }
}
