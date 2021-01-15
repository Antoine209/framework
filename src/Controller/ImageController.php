<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/img", name="class_img")
 */
class ImageController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(): Response {
        return $this->render('img/home.html.twig');
    }

    /**
     * @Route("/data/{nom}", name="image")
     */
    public function affiche( $nom ): Response {
        $image = __DIR__."/../../images/${nom}.jpg";
        $res = new Response();
        $res->headers->set("Content-Type", "images/jpg");
        if (!file_exists($image)) {
            return $this->render("error.html.twig", ["msg" => "error"]);
        }
        return $this->file($image);
    }

    /**
     * @Route("/menu", name="menu_img")
     */
    public function menu(): Response {
        $images = scandir(__DIR__."/../../images");
        foreach($images as $elements => $elmt) {
            if(!is_dir($elmt)) {
                $images[$elements] = substr($elmt, 0, strripos($elmt, '.'));
            } else {
                unset($images[$elements]);
            }
        }
        return $this->render('menu.html.twig', ['url' => '/img/data/', 'elements' => $images]);
    }
}