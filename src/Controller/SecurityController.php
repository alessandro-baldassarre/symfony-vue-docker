<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    public function logout()
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

    #[Route('/api/userinfo', name: 'api_login', methods: ['GET'])]
    public function getUserInfo(): Response
    {

        // if (null === $user) {
        //          return $this->json(['message' => 'missing credentials',], Response::HTTP_UNAUTHORIZED);
        //      }
    
        //     //  $token = ...; // somehow create an API token for $user
        // return $this->json(['user'  => $user->getUserIdentifier()]);
        // dd($this->getUser()->getUserIdentifier());
        $user = $this->getUser()->getUserIdentifier();
        return $this->json(['user' => $user]);
    }
}
