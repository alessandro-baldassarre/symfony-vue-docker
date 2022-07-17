<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
// /**
//  * Require ROLE_ADMIN for all the actions of this controller
//  */
// #[IsGranted('ROLE_ADMIN')]
class TaskController extends AbstractController
{   
    // /**
    //  * Require IS_AUTHENTICATED_FULLY only for this action
    //  */
    // #[IsGranted('IS_AUTHENTICATED_FULLY')]

    #[Route('/task/create', name: 'create_task')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {   
        $this->denyAccessUnlessGranted('ROLE_USER', null, 'User tried to access a page without having ROLE_ADMIN');
        // just set up a fresh $task object (remove the example data)
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            // $this->addFlash(
            //     'notice',
            //     'Task Added!'
            // );
            // return $this->redirectToRoute('task_success');
            return $this->redirectToRoute($request->attributes->get('_route'));

        }

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);
    }
}
