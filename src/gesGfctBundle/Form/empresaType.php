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

class empresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('label'=>'Nombre Empresa:  ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'nomEmp')))

            ->add('direccion',TextType::class,array('label'=>'Direccion Empresa: ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'dirEmp')))

            ->add('cp',IntegerType::class,array('label'=>'CodigoPostal Empresa: ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'cpEmp')))

            ->add('telefono1',IntegerType::class,array('label'=>'Primer telefono: ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'telfEmp')))

            ->add('telefono2',IntegerType::class,array('label'=>'Segundo telefono: ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'telfEmp2')))

            ->add('fechaCreacion',DateType::class,array('label'=>'Fecha de Creacion: ',
            'label_attr'=>array('class'=>'labelEmp'),
            'attr'=>array('class'=>'fechaEmp')))

            ->add('guardar',SubmitType::class,array('label'=>'Guardar',
            'attr'=>array('class'=>'buttonG')))

            ->add('borrar',ResetType::class,array('label'=>'Borrar',
            'attr'=>array('class'=>'buttonB')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gesGfctBundle\Entity\empresa'
        ));
    }
}
