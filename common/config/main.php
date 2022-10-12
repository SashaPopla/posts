<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'en',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en',
                    'sourceMessageTable' => 'source_message',
                    'messageTable' => 'message',
                    'cachingDuration' => 86400,
                    'enableCaching' => false,
                ],
            ],
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'Imagick',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
    ],
];
