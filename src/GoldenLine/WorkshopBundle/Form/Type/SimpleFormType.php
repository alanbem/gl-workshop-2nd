<?php

/*
 * This file is part of the gl-workshop-2nd package.
 *
 * (C) Alan Gabriel Bem <alan.bem@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GoldenLine\WorkshopBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * SimpleFormType class
 *
 * @author Alan Gabriel Bem <alan.bem@gmail.com>
 */
class SimpleFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'number', array(
                'required' => false,
                'constraints' => array(new NotBlank(),
            )));
        $builder->add('password', 'repeated', array('type' => 'password'));
        $builder->add(
            'gender',
            'choice',
            array('choices' => array('m' => 'Male', 'f' => 'Female'), 'multiple' => true, 'expanded' => false)
        );
        $builder->add('birth_at', 'date', array('widget' => 'text'));

        $builder->add('address', new AddressType());

        $builder->add('save', 'submit');
        $builder->add('not_save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'GoldenLine\WorkshopBundle\Entity\Human',
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'simple_form';
    }
}






//
//
//
//class Pit36Type extends AbstractType implements StepableFormType
//{
//    const TAXATION_INDIVIDUAL = 'individual';
//
//    const TAXATION_WITH_SPOUSE = 'with_spouse';
//
//    /**
//     * @param FormBuilderInterface $builder
//     * @param array $options
//     */
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('year')
//            ->add(
//                'taxation',
//                'choice',
//                array(
//                    "mapped" => false,
//                    'choices' => array(
//                        self::TAXATION_INDIVIDUAL => 'Individual',
//                        self::TAXATION_WITH_SPOUSE => 'with Spouse'
//                    ),
//                    'expanded' => true,
//                    'required' => true,
//                    'empty_value' => false,
//                    'empty_data' => self::TAXATION_INDIVIDUAL,
//                    "constraints" => array(
//                        new NotNull(),
//                        new Choice(array('choices' => array(self::TAXATION_INDIVIDUAL, self::TAXATION_WITH_SPOUSE,))),
//                    ),
//                )
//            )
//            ->add('taxPayer', new TaxPayerType())
//            ->add('taxPayerAddress', new AddressType())
//            ->add('taxPayersSpouse', new TaxPayerType(), array(
//                    'required' => false,
//                    'validation_groups' => function (FormInterface $form) {
//                            if ($form->getParent()->get('taxation')->getData() === self::TAXATION_INDIVIDUAL) {
//                                return array();
//                            }
//                            return array('Default');
//                        }
//                ))
//            ->add('taxPayersSpouseAddress', new AddressType(),
//                array(
//                    'required' => false,
//                    'validation_groups' => function (FormInterface $form) {
//                            if ($form->getParent()->get('taxation')->getData() === self::TAXATION_INDIVIDUAL) {
//                                return array();
//                            }
//                            return array('Default');
//                        }
//                )
//            )
//            ->add('income', 'money')
//            ->add('costs', 'money')
//            ->add('profit', 'money')
//            ->add('loss', 'money')
//            ->add('tax', 'money')
//            ->add('save', 'submit')
//        ;
//
//        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {});
//        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {});
//        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {});
//        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
//                $form = $event->getForm();
//                /* @var $pit Pit36 */
//                if ($form->get('taxation')->getData() === self::TAXATION_INDIVIDUAL) {
//                    $pit = $event->getData();
//                    $pit->clearTaxPayersSpouseInformation();
//                }
//            });
//        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {});
//    }
//
//    /**
//     * @param OptionsResolverInterface $resolver
//     */
//    public function setDefaultOptions(OptionsResolverInterface $resolver)
//    {
//        $resolver->setDefaults(array(
//                'data_class' => 'Goldenline\DeclarationBundle\Entity\Declaration\Pit36'
//            ));
//
//        $resolver->setDefaults(array('cascade_validation' => true));
//    }
//
//    /**
//     * @return string
//     */
//    public function getName()
//    {
//        return 'declaration_pit36';
//    }
//
//    public function getFieldsForStep($step)
//    {
//        return array(
//            'year',
//            'taxation',
//        );
//    }
//
//    public function getButtonsForStep($step)
//    {
//        return array(
//            'save',
//        );
//    }
//
//
//}
