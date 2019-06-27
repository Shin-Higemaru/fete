<?php


namespace App\Controller;

use App\Entity\User;
use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController {
    /**
     * @return Response;
     * @Route( "/", name="index")
     */

    public function index(){
        $em= $this->getDoctrine()->getManager();
        $events = $em->getRepository(Event::class)->findAll();
        $users = $em->getRepository(User::class)->findAll();
//        dump($users);
//        die();

        return $this->render("coco.html.twig", [ "events"=>$events]);
    }
}


