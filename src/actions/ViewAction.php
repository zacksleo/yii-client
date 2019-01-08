<?php

namespace zacksleo\yii2\client\actions;

use yii\base\Action;
use zacksleo\yii2\client\models\Client;
use zacksleo\yii2\client\models\ClientRelease;
use yii\web\NotFoundHttpException;

class ViewAction extends Action
{
    public $slug;
    public $version;

    public function run()
    {
        if (($client = Client::findOne(['slug' => $this->slug, 'status' => Client::STATUS_ACTIVE])) == null) {
            throw new NotFoundHttpException('Your request does not exists.');
        }
        $relsese = ClientRelease::find()->orderBy('created_at DESC')
            ->where(
                [
                    'client_id' => $client->id,
                    'version' => $this->version
                ]
            )
            ->one();
        if (empty($relsese)) {
            throw new NotFoundHttpException('Your request does not exists.');
        }
        return  $release;
    }
}
