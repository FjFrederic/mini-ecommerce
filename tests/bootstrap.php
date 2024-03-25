<?php

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;

require dirname(__DIR__).'/vendor/autoload.php';

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

$debug = (bool) ($_SERVER['APP_DEBUG'] ?? ($env !== 'prod'));

if ($debug) {
    umask(0000);
    // if (class_exists(Debug::class)) {
    //     Debug::enable();
    // }
}

$env = $_SERVER['APP_ENV'] ?? 'test';

if ($env !== 'test') {
    die('Cannot run tests in a non test environment.');
}

// Create Symfony application
$kernel = new \App\Kernel($_SERVER['APP_ENV'], (bool)$_SERVER['APP_DEBUG']);
$application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
$application->setAutoExit(false);

$application->run(new \Symfony\Component\Console\Input\ArrayInput([
    'command' => 'doctrine:database:create',
    '--if-not-exists' => true,
    '--env' => 'test',
]));

$application->run(new \Symfony\Component\Console\Input\ArrayInput([
    'command' => 'doctrine:migrations:migrate',
    '--no-interaction' => true,
    '--env' => 'test',
]));

