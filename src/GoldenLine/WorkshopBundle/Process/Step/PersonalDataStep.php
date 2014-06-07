<?php

namespace GoldenLine\WorkshopBundle\Process\Step;

use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;
use Sylius\Bundle\FlowBundle\Process\Step\ControllerStep;
use Symfony\Component\HttpFoundation\Response;

class PersonalDataStep extends ControllerStep
{
    public function displayAction(ProcessContextInterface $context)
    {
        $form = $this->getForm();

        return $this->render('WorkshopBundle:Registration:profile.html.twig', ['form' => $form->createView()]);
    }

    public function forwardAction(ProcessContextInterface $context)
    {
        $form = $this->getForm();

        $form->handleRequest($context->getRequest());

        if ($form->isValid()) {
            $storage = $context->getStorage();
            $storage->set('profile', $form->getData());

            $data = $form->getData();

            switch ($data['type']) {
                case 0:
                    return $this->proceed('dinner');

                case 1:
                default:
                    return $this->proceed('kasa');
            }
        }

        return $this->render('WorkshopBundle:Registration:profile.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function getForm()
    {
        $form = $this->createFormBuilder()
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('type', 'choice', ['choices' => ['uczestnik', 'prelegent']])
            ->add('submit', 'submit')
            ->setAction(
                $this->generateUrl('sylius_flow_forward', ['scenarioAlias' => 'rejestracja', 'stepName' => 'profil'])
            )
            ->getForm();
        return $form;
    }
}
