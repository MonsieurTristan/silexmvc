<?php

namespace App\Computer\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ComputerController
{
    public function listAction(Request $request, Application $app)
    {
        $computer= $app['repository.computer']->getAll();

        return $app['twig']->render('computer.list.html.twig', array('computers' => $computer));
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $app['repository.computer']->delete($parameters['id']);

        return $app->redirect($app['url_generator']->generate('computer.list'));
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $computer = $app['repository.computer']->getById($parameters['id']);

        return $app['twig']->render('computer.form.html.twig', array('computers' => $computer));
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $computer = $app['repository.computer']->update($parameters);
        } else {
            $computer = $app['repository.computer']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('computer.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        return $app['twig']->render('computer.form.html.twig');
    }
}
