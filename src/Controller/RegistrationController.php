<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        
        if ($request->getContent() != "") {
            $registration_form = $request->request->all();
            // dd($registration_form["email"]);
            $user = new User();
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $registration_form["password"]
                ));

            $user->setEmail($registration_form["email"]);

            $errors = $validator->validate($user);

            if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
            return $this->redirectToRoute($request->attributes->get('_route'), ['errors' => $errors]);
            }
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');

        }
        $errors = "";
        return $this->render('registration/register.html.twig', ['errors' => $errors]);
    }
}
