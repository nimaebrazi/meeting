<?php

use Meeting\App\Repository\MeetingRepository;
use Meeting\App\Service\MeetingService;
use Meeting\Core\App;
use Meeting\Core\Container;
use Meeting\Core\Database;


$container = new Container();

$container->bind('db', function () {
    return new Database(config('database'));
});

$container->bind('meetingRepository', function () use ($container) {
    return new MeetingRepository(
        $container->resolve('db')
    );
});

$container->bind('meetingService', function () use ($container) {
    return new MeetingService(
        $container->resolve('meetingRepository')
    );
});


App::setContainer($container);