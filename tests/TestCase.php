<?php
namespace tests;

use yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\db\Schema;

/**
 * This is the base class for all yii framework unit tests.
 */

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();
        $this->setupTestDbData();
        $this->createRuntimeFolder();
    }
    protected function tearDown()
    {
        $this->destroyApplication();
    }
    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application')
    {
        return new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'sqlite::memory:'
                ],
                'request' => [
                    'hostInfo' => 'http://domain.com',
                    'scriptUrl' => 'index.php',
                ],
                'i18n' => [
                    'translations' => [
                        'zacksleo/yii2/client/*' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                            'basePath' => '@zacksleo/yii2/client/messages',
                            'sourceLanguage' => 'en-US',
                            'fileMap' => [
                                'zacksleo/yii2/client/client' => 'client.php',
                            ],
                        ]
                    ],
                ],
            ],
            'modules' => [
                'client' => [
                    'class' => 'zacksleo\yii2\client\Module',
                    'controllerNamespace' => 'tests\data\controllers'
                ]
            ]
        ], $config));
    }
    /**
     * @return string vendor path
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }
    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
    }
    /**
     * Setup tables for test ActiveRecord
     */
    protected function setupTestDbData()
    {
        $db = Yii::$app->getDb();
        // Structure :
        $tables = $db->schema->getTableNames();
        foreach ($tables as $table) {
            Yii::app()->db->createCommand()->dropTable($table)->execute();
        }
        $db->createCommand()->createTable('client', [
            'id' => 'pk',
            'name' => 'string not null',
            'slug' => 'string not null',
            'status' => 'boolean not null default 0',
        ])->execute();
        $db->createCommand()->createTable('client_release', [
            'id' => 'pk',
            'client_id' => 'integer',
            'version' => 'string not null',
            'status' => 'boolean not null default 0',
            'created_at' => 'integer not null',
            'updated_at' => 'integer not null',
        ])->execute();
    }
    /**
     * Create runtime folder
     */
    protected function createRuntimeFolder()
    {
        FileHelper::createDirectory(dirname(__DIR__) . '/tests/runtime');
    }
}
