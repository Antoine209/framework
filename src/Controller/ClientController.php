<?php


namespace App\Controller;

use http\Client\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client)
 * Class ClientController
 * @package App\Controller
 */
class ClientController
{
    /**
     * @Route("/prenom/{prenom}", name="client_info")
     * @param $prenom
     * @return Response
     */
    function info($prenom) {
        return new Response("le prénom est $prenom");
    }
}