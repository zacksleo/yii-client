<?php

namespace zacksleo\yii2\client\models;

use Yii;
use zacksleo\yii2\client\Module;

/**
 * This is the model class for table "{{%ad_position}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $status
 */
class Client extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            ['slug', 'unique'],
            [['status'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('ad', 'ID'),
            'name' => Module::t('ad', 'Name'),
            'slug' => Module::t('ad', 'Slug'),
            'status' => Module::t('ad', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleases()
    {
        return $this->hasMany(ClientReleases::className(), ['client_id' => 'id']);
    }

    /**
     * 状态列表
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_ACTIVE => Module::t('client', 'Active'),
            self::STATUS_INACTIVE => Module::t('client', 'Inactive'),
        ];
    }
}
