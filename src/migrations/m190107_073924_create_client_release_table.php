<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ad`.
 */
class m190107_073924_create_client_release_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%client_release}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'version' => $this->string()->notNull(),
            'status' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        return true;
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%client_release}}');
        return true;
    }
}
