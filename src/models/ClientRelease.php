<?php

namespace zacksleo\yii2\client\models;

use Yii;
use yii\helpers\Url;
use zacksleo\yii2\client\Module;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%ad}}".
 *
 * @property integer $id
 * @property integer $client_id
 * @property string $img
 * @property integer $status
 */
class ClientRelease extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_IN_REVIEW = 2;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client_release}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'version'], 'required'],
            [['client_id', 'status'], 'integer'],
            [['version'], 'string'],
            [['version'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('client', 'ID'),
            'client_id' => Module::t('client', 'Client ID'),
            'status' => Module::t('client', 'Status'),
            'version' => Module::t('client', 'Version'),
            'created_at' => Module::t('client', 'CreatedAt'),
            'updated_at' => Module::t('client', 'UpdatedAt'),
        ];
    }

    public function fields()
    {
        return [
            'id',
            'version',
            'status',
        ];
    }

    /**
     * 状态列表
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE => Module::t('client', 'Active'),
            self::STATUS_IN_REVIEW => Module::t('client', 'InReview'),
            self::STATUS_INACTIVE => Module::t('client', 'Inactive'),
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
}
