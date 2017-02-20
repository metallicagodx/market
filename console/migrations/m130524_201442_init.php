r<?php

use yii\db\Migration;
use common\models\User;

class m130524_201442_init extends Migration
{
    private $tableName = '{{%users}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        /**
         * Create 3 different kind of users for testing
         */
        $this->insertUser('admin', 'qwerty', 'admin@gmail.com', '10');
        $this->insertUser('user', 'qwerty', 'user@gmail.com', '10');
        $this->insertUser('banned', 'qwerty', 'banned@gmail.com', '2');
    }

    public function insertUser($username, $password, $email, $status)
    {
        $user = new User();
        $user->username = $username;
        $user->generateAuthKey();
        $user->setPassword($password);
        $user->generatePasswordResetToken();
        $user->email = $email;
        $user->status = $status;
        $user->save(false);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
