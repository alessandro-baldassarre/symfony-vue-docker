<?php 

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;


class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from(new Address('fabien@example.com', 'Fabien'))
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

            try {
                $response = $mailer->send($email);
               
                dump($response);
                $response = new Response(
                    'Content',
                    Response::HTTP_OK,
                    ['content-type' => 'text/html']
                );
        
                $response->setContent('Email Sent');
        
                return $this->render('home.html.twig');

            } catch (TransportExceptionInterface $e) {
                dump($e);
            }

    }
}