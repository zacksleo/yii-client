<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ad_position`.
 */
class m190107_073836_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'status' => $this->boolean(),
        ]);
        return true;
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%client}}');
        return true;
    }
}
