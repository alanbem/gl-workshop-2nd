<?php

namespace GoldenLine\WorkshopBundle\Process\Scenario;

use Sylius\Bundle\FlowBundle\Process\Builder\ProcessBuilderInterface;
use Sylius\Bundle\FlowBundle\Process\Scenario\ProcessScenarioInterface;
use GoldenLine\WorkshopBundle\Process\Step;

class RegistrationScenario implements ProcessScenarioInterface
{
    public function build(ProcessBuilderInterface $builder)
    {
        $builder
            ->add('profil', new Step\PersonalDataStep())
            ->add('kasa', new Step\PaymentStep())
            ->add('dinner', new Step\DinnerStep())
            ->setRedirect('workshop_homepage');
    }
}
