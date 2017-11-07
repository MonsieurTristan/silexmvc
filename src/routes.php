<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');

$app->get('/computer/list', 'App\Computer\Controller\ComputerController::listAction')->bind('computer.list');
$app->get('/computer/edit/{id}', 'App\Computer\Controller\ComputerController::editAction')->bind('computer.edit');
$app->get('/computer/new', 'App\Computer\Controller\ComputerController::newAction')->bind('computer.new');
$app->post('/computer/delete/{id}', 'App\Computer\Controller\ComputerController::deleteAction')->bind('computer.delete');
$app->post('/computer/save', 'App\Computer\Controller\ComputerController::saveAction')->bind('computer.save');
