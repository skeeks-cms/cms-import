<?php
return [

    'controllerMap' => [
        'migrate' => [
            'migrationPath' => [
                '@skeeks/cms/import/migrations',
            ],
        ],
    ],


    'modules' => [
        'cmsImport' => [
            'controllerNamespace' => 'skeeks\cms\import\console\controllers',
        ],
    ],
];