<?php

use InterviewExercise\Common\StatusController;
use InterviewExercise\Middleware\Validators\TokenValidator;
use InterviewExercise\Pet\Controllers\PetController;
use DI\Bridge\Slim\Bridge;
use Slim\Interfaces\RouteCollectorProxyInterface;

require __DIR__ . '/../vendor/autoload.php';

$app = Bridge::create();

$app->get('/status', [StatusController::class, 'status']);
$app->group(
    '/pet', function (RouteCollectorProxyInterface $group) {
        $group->get('/{petId}', [PetController::class, 'getById']);
        $group->get('/name/{name}', [PetController::class, 'getByName']);
    }
)->add(new TokenValidator());

$app->run();
