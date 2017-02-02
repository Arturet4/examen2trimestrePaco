<?php


namespace gesGfctBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class confType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('param',TextType::class,array('label'=>'nombre param:  ',
            'label_attr'=>array('class'=>'labelCo'),
            'attr'=>array('class'=>'parCo')))

            ->add('configuracion',TextType::class,array('label'=>'configuracion: ',
            'label_attr'=>array('class'=>'labelCo'),
            'attr'=>array('class'=>'conCo')))


            ->add('guardar',SubmitType::class,array('label'=>'Guardar',
            'attr'=>array('class'=>'buttonG')))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gesGfctBundle\Entity\conf'
        ));
    }
}
