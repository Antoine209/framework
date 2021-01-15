<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;
use Doctrine\ORM\EntityManagerInterface;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     * @return Response
     */
    public function login(Request $request, TranslatorInterface $translator)
    {
        $login = [];
        $form = $this->createFormBuilder($login);
        $contrainte = new NotBlank();
        /*$entityManager = $this->getDoctrine()->getManager();
        $user = new User();*/

        $form->add("email", EmailType::class, ['constraints' => [$contrainte, new Length(['min'=>3])]])
             ->add("password", RepeatedType::class, [
                 'type' => PasswordType::class,
                 'options' => ['attr' => ['class' => 'password-field']],
                 'constraints' => [ new Length(['min' => 8, 'minMessage' => 'mot de passe trop court, minimum {{ limit }}']),
                                    /*new Regex(['pattern' => "^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$^", 'message' => $translator->trans('password_invalid_pattern')])*/],
                 'required' => true,
                 'first_options'  => ['label' => 'mot de passe'],
                 'second_options' => ['label' => 'confirmer mot de passe'],
             ])
             ->add("submit", SubmitType::class);

        $finalForm = $form->getForm();
        $finalForm->handleRequest($request);

        if ($finalForm->isSubmitted() && $finalForm->isValid()) {
            $data = $finalForm->getData();

            var_dump($data.password);

            /*
            $entityManager->setEmail($data);
            $entityManager->setPassword($data);
            */

            /*$entityManager->persist($user);
            $entityManager->flush();*/

            return $this->render("authok.html.twig", ["data" => $data]);
        }
        return $this->render("login.html.twig", ["formulaire" => $finalForm->createView()]);
    }
}