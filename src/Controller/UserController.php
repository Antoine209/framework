<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 * Class User
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @Route("/info/{email}", name="client_info")
     * @param $email
     * @return Response
     */
    function info($email)
    {
        return $this->render('user.html.twig',['email'=>$email]);
    }
}