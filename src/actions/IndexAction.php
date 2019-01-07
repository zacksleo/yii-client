<?php

namespace zacksleo\yii2\client\actions;

use yii\base\Action;
use zacksleo\yii2\client\models\Client;

class IndexAction extends Action
{
    public function run()
    {
        return Client::find()->all();
    }
}
