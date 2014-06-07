<?php

namespace GoldenLine\WorkshopBundle\Controller;

use GoldenLine\WorkshopBundle\Form\Type\SimpleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new SimpleFormType());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
        }


        return $this->render('WorkshopBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
