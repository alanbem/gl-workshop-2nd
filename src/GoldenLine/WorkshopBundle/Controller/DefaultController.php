<?php

namespace GoldenLine\WorkshopBundle\Controller;

use GoldenLine\WorkshopBundle\Form\Type\SimpleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $form = $this->createForm(new SimpleFormType());

        return $this->render('WorkshopBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
