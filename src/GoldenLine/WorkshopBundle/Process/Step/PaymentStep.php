<?php

namespace GoldenLine\WorkshopBundle\Process\Step;

use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;
use Sylius\Bundle\FlowBundle\Process\Step\ControllerStep;

class PaymentStep extends ControllerStep
{
    public function displayAction(ProcessContextInterface $context)
    {
        $form = $this->getForm();

        $storage = $context->getStorage();
        $profile = $storage->get('profile');

        return $this->render('WorkshopBundle:Registration:payment.html.twig', ['form' => $form->createView(), 'profile' => $profile]);
    }

    public function forwardAction(ProcessContextInterface $context)
    {
        $form = $this->getForm();

        $form->handleRequest($context->getRequest());

        if ($form->isValid()) {
            $storage = $context->getStorage();
            $storage->set('payment', $form->getData());

            return $this->complete();
        }

        return $this->render('WorkshopBundle:Registration:payment.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function getForm()
    {
        $form = $this->createFormBuilder()
            ->add('number', 'number')
            ->add('cvv', 'number')
            ->add('submit', 'submit')
            ->setAction(
                $this->generateUrl('sylius_flow_forward', ['scenarioAlias' => 'rejestracja', 'stepName' => 'kasa'])
            )
            ->getForm();
        return $form;
    }
} 
