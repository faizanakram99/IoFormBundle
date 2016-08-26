<?php


/*
 * Part of forked version of IoFormBundle compatible with Symfony 2.8 (and above including 3.0)
 * Faizan Akram! < hello@faizanakram.me >
 *
 * Notice from original author below
 *
 * This file is part of the IoFormBundle package
 *
 * (c) Alessio Baglio <io.alessio@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Io\FormBundle\Form\Extension\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Io\FormBundle\DataTransformer\OneEntityToIdTransformer;

/**
 * Entity identitifer
 *
 * @author Gregwar <g.passault@gmail.com>
 */
class EntityIdType extends AbstractType
{
    protected $registry;
    protected $hidden;

    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->hidden = $options['hidden'];
        $builder->addViewTransformer(new OneEntityToIdTransformer(
            $this->registry->getManager($options['em']),
            $options['class'],
            $options['choice_label'],
            $options['query_builder']
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults (array (
            'compound' => false,
            'em' => null,
            'class' => null,
            'choice_label' => null,
            'query_builder' => null,
            'type' => HiddenType::class,
            'hidden' => true,
        ));
    }

    public function getParent()
    {
        return $this->hidden ? HiddenType::class : TextType::class;
    }

    public function getBlockPrefix()
    {
        return $this->getName();
    }

    public function getName()
    {
        return 'entity_id';
    }
}

