<?php
return [

    'components' => [
        'cmsImport' => [
            'class' => 'skeeks\cms\import\ImportComponent',
        ],

        'i18n' => [
            'translations' =>
                [
                    'skeeks/import' => [
                        'class'    => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@skeeks/cms/import/messages',
                        'fileMap'  => [
                            'skeeks/import' => 'main.php',
                        ],
                    ],
                ],
        ],

        'authManager' => [
            'config' => [
                'roles'       => [
                    [
                        'name'  => \skeeks\cms\rbac\CmsManager::ROLE_ADMIN,
                        'child' => [
                            'permissions' => [
                                "cmsImport/admin-import-task",
                            ],
                        ],
                    ],
                ],
                'permissions' => [
                    [
                        'name'        => 'cmsImport/admin-import-task',
                        'description' => "Импорт",
                    ],
                ],
            ],
        ],

    ],

    'modules' => [
        'cmsImport' => [
            'class' => 'skeeks\cms\import\ImportModule',
        ],
    ],
];