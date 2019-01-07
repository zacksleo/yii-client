[![Latest Stable Version](https://poser.pugx.org/zacksleo/yii-client/version)](https://packagist.org/packages/zacksleo/yii-client)
[![Total Downloads](https://poser.pugx.org/zacksleo/yii-client/downloads)](https://packagist.org/packages/zacksleo/yii-client)
[![License](https://poser.pugx.org/zacksleo/yii-client/license)](https://packagist.org/packages/zacksleo/yii-client)
[![Build Status](https://travis-ci.org/zacksleo/yii-client.svg?branch=master)](https://travis-ci.org/zacksleo/yii-client)
[![StyleCI](https://styleci.io/repos/82318907/shield?branch=master)](https://styleci.io/repos/82318907)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zacksleo/yii-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zacksleo/yii-client/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/zacksleo/yii-client/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/zacksleo/yii-client/?branch=master)
# yii client module

## Migration

+ Config Migration Path  in Yii config file like this

```
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                ...
                '@zacksleo/yii2/client/migrations',
            ],
        ],
    ],

```

+ Or run migration by By migrationPath Parameter

```
  ./yii migrate --migrationPath=@zacksleo/yii2/client/migrations

```

## Config Module in components part

```
    'rom-release' => [
        'class' => 'zacksleo\yii2\ad\Module',
    ]

```

## Use Actions

```
class AdController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'zacksleo\yii2\ad\actions\IndexAction'
            ]
        ];
    }
}
```