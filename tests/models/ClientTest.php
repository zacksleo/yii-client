<?php
namespace tests\models;

use yii;
use tests\TestCase;
use zacksleo\yii2\client\models\Client;

class ClientTest extends TestCase
{
    public function testTableName()
    {
        $model = new Client();
        $this->assertSame('client', $model->getTableSchema()->name);
    }

    public function testRules()
    {
        $model = new Client();
        $this->assertTrue($model->isAttributeRequired('name'));
        $this->assertTrue($model->isAttributeRequired('slug'));
        $model->name = 'app';
        $model->slug = 'app';
        $model->status = 'status';
        $this->assertFalse($model->validate());
    }
    public function testSave()
    {
        $model = new Client();
        $model->name = 'app';
        $model->slug = 'app';
        $model->status = 0;
        $this->assertTrue($model->save());
    }
    public function testAttributeLabels()
    {
        $model = new Client();
        $labels = $model->attributeLabels();
        $this->assertArrayHasKey('id', $labels);
        $this->assertArrayHasKey('name', $labels);
        $this->assertArrayHasKey('slug', $labels);
        $this->assertArrayHasKey('status', $labels);
    }
    public function testGetStatusList()
    {
        $list = Client::getStatusList();
        $this->assertEquals(2, count($list));
    }
}
