<?php

use yii\base\Event;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@domain' => '@app/src/Domain',
        '@application' => '@app/src/Application',
        '@infrastructure' => '@app/src/Infrastructure',
        '@presentation' => '@app/src/Presentation',
    ],
    'controllerNamespace' => 'app\src\Presentation\Controller',
    'container' => [
        'definitions' => [
            'app\src\Domain\Repository\ProductRepositoryInterface' => 'app\src\Infrastructure\Persistence\ProductRepository',
            'app\src\Domain\Repository\ClientRepositoryInterface' => 'app\src\Infrastructure\Persistence\ClientRepository',
            'app\src\Domain\Repository\SaleRepositoryInterface' => 'app\src\Infrastructure\Persistence\SaleRepository',
        ],
        'singletons' => [
            'app\src\Application\EventHandler\SaleEventHandler' => [
                'class' => 'app\src\Application\EventHandler\SaleEventHandler',
            ],
        ],
    ],
    'on beforeRequest' => function () {
        Event::on(
            \app\src\Domain\Event\SaleEvent::class,
            \app\src\Domain\Event\SaleEvent::EVENT_NAME,
            [Yii::$container->get('app\src\Application\EventHandler\SaleEventHandler'), 'handle']
        );
    },
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'aTH7LQhNrnotk1sABKbZcni8oTdpbgZS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'eventManager' => [
            'class' => 'yii\base\Component',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'client/index',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
