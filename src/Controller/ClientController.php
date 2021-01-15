<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/client")
 * Class ClientController
 * @package App\Controller
 */
class ClientController extends AbstractController
{
    /**
     * @Route("/prenom/{prenom<^[a-zA-Z](-?[a-zA-Z])*>}", name="client_info")
     * @param $prenom
     * @return Response
     */
    public function info($prenom) {
        return new Response("le prénom est $prenom", 200, ["Content-Type" => "text/plain"]);
    }

    /**
     * @Route("/clients", name="Clients", Options={"ouverture":"8-17"})
     */
    public function home(): Response
    {
        return $this->render('event/index.html.twig');
    }
}
