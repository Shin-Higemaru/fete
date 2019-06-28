<?php


namespace App\Controller;


use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController{

    /**
     *
     * @Route("/creer-un-evenement", name="create-event")
     */
    public function newEvent(Request $req){
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

//        dump($req);
//        die($req);
        $event = new Event();
        $event->setCreator($this->getUser());
        $event->setcreatedAt(new \DateTime());
        $event->setupdatedAt(new \DateTime());
//        $event->setIsPrivate();

        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($req);

        //Enregistrer dans la BDD nos events
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

    /**
     * @Route("/modifier-evenement/{id}", name="update-event")
     */
    public function updateEvent(Event $event, Request $req){

        $form = $this->createFormBuilder( $event )
            ->add("name", null, ["label"=>"Nom "])
            ->add("dday", null, ["label"=>"Quand ? "])
            ->add("adresse", null, ["label"=>"adresse "])
            ->add("description", null, ["label"=>"description "])
            ->add("is_private", null, ["label"=>"privé ?"])
            ->add("valider", SubmitType::class)
            ->getForm();

        $form->handleRequest($req);

        //Enregistrer dans la BDD nos events
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