<?php
return [
    'components' =>
    [
        'cmsImport' => [
            'class'     => 'skeeks\cms\import\ImportComponent',
        ],

        'i18n' => [
            'translations' =>
            [
                'skeeks/import' => [
                    'class'             => 'yii\i18n\PhpMessageSource',
                    'basePath'          => '@skeeks/cms/import/messages',
                    'fileMap' => [
                        'skeeks/import' => 'main.php',
                    ],
                ]
            ]
        ]
    ],

    'modules' =>
    [
        'cmsImport' => [
            'class'                 => 'skeeks\cms\import\ImportModule',
            'controllerNamespace'   => 'skeeks\cms\import\console\controllers'
        ]
    ]
];