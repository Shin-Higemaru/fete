<?php


namespace App\Controller;


use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController{

    /**
     * @Route("/creer-un-evenement", name="create-event")
     */
    public function newEvent(Request $req){
//        dump($req);
//        die($req);
        $event = new Event();

        $form = $this->createFormBuilder( $event )
            ->add("name", null, ["label"=>"Nom "])
            ->add("dday", null, ["label"=>"Quand ? "])
            ->add("adresse", null, ["label"=>"adresse "])
            ->add("description", null, ["label"=>"description "])
            ->add("valider", SubmitType::class)
            ->getForm();

        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $event=$form->getData();
//            dump($event);
//            die();
            $em=$this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute("index");
        }

        return $this->render("forms/newevent.html.twig", ["form"=>$form->createView()]);
    }
}