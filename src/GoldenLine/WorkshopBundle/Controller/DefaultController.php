<?php

namespace GoldenLine\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorkshopBundle:Default:index.html.twig');
    }
}
