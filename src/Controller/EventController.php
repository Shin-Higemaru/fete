<?php


namespace App\Controller;


use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController{

    /**
     * @Route("/creer-un-evenement", name="create-event")
     */
    public function newEvent(){
        $event = new Event();

        $form = $this->createFormBuilder($event)
            ->add("name")
            ->getForm();

        return $this->render("forms/newevent.html.twig", ["form"=>$form->createView()]);
    }
}