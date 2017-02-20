<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // @TODO http://developer.uz/blog/rbac-%D1%80%D0%BE%D0%BB%D0%B8-%D0%B8-%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D0%B8-%D0%B2-yii2/
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
