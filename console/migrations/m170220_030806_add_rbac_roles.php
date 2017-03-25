<?php

use yii\db\Migration;
use common\models\User;

class m170220_030806_add_rbac_roles extends Migration
{
    public function safeUp()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        $adminRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($adminRole, User::findByUsername('admin')->getId());

        $role = Yii::$app->authManager->createRole('user');
        $role->description = 'Пользователь';
        Yii::$app->authManager->add($role);

        $userRole = Yii::$app->authManager->getRole('user');
        Yii::$app->authManager->assign($userRole, User::findByUsername('user')->getId());
        // No idea why it doesn't work (getId() return null)
        //Yii::$app->authManager->assign($userRole, User::findByUsername('banned')->getId());
    }

    public function safeDown()
    {
        Yii::$app->authManager->revokeAll(User::findByUsername('admin')->getId());
        Yii::$app->authManager->revokeAll(User::findByUsername('user')->getId());

        //Yii::$app->authManager->revokeAll(User::findByUsername('banned')->getId());
        Yii::$app->authManager->removeAll();
    }
}
