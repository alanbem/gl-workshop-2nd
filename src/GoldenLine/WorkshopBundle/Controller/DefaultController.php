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

        if ($request->isMethod('post') && $form->isValid()) {
            $save = $form->get('save')->isClicked();
            $notsave = $form->get('not_save')->isClicked();
        }


        return $this->render('WorkshopBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
