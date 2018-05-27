<?php

namespace Tabhan\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TabhanTestBundle:Default:index.html.twig');
    }
}
