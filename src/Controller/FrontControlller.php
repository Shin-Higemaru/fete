<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontControlller{
    /**
     * @return Response
     * @Route( "/", name="index")
     */

    public function index(){
        return new Response("Sssssalut");
    }
}