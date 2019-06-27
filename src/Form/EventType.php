<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichFileType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", null, ["label"=>"Nom "])
            ->add("dday", DateTimeType::class, ["label"=>"Date de début "])
            ->add("endday", DateTimeType::class, ["label"=>"Date de fin "])
            ->add("adresse", null, ["label"=>"adresse "])
            ->add("description", null, ["label"=>"description "])
            ->add('imageFile',VichFileType::class)
            ->add("valider", SubmitType::class)
        ;
    }
}