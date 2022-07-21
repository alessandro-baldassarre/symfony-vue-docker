<?php

namespace App\Controller;

use App\Entity\Pdf;
use App\Entity\File;
use App\Entity\Video;
use App\Entity\Author;
use App\Entity\Task;
use App\Entity\User;
use App\Service\Service;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use App\Event\VideoCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    #[Route('/', name: 'app_home')]
    #[Route('/{route}', name: 'vue_pages', requirements: ['route' => '^(?!.*login|logout|register).+'])]
    public function index(ManagerRegistry $doctrine,Service $service, TranslatorInterface $translator, Request $request): Response
    {   
        // $entityManager = $doctrine->getManager();
        
        // $task = new Task;

        // $task->setTask("task test");

        // $date = new DateTime('now');

        // $task->setDueDate($date);

        // $entityManager->persist($task);

        // $entityManager->flush($task);
        
        // $cache = new FilesystemAdapter();

        // $post = $cache->getItem('database.get_post');

        // if (!$post->isHit()) {
        //     $post_from_db = ['post1', 'post2', 'post3'];
        //     dump("connected with db...");
        //     $post->set(serialize($post_from_db));
        //     $post->expiresAfter(5);
        //     $cache->save($post);
        // }

        // $cache->clear();

        // dump(unserialize($post->get()));
        // $cache = new TagAwareAdapter(new FilesystemAdapter());

        // $acer = $cache->getItem('acer');
        // $ibm = $cache->getItem('ibm');
        // $dell = $cache->getItem('dell');
        // $apple = $cache->getItem('apple');

        
        // if(!$acer->isHit()){
        //     $acer_from_db = 'acer laptop';
        //     $acer->set($acer_from_db);
        //     $acer->tag(['computers', 'laptops', 'acer']);
        //     $acer->expiresAfter(5);
        //     $cache->save($acer);
        //     dump('acer laptop from database..');
        // }
        
        // if(!$ibm->isHit()){
        //     $ibm_from_db = 'ibm laptop';
        //     $ibm->set($ibm_from_db);
        //     $ibm->tag(['computers', 'desktop', 'ibm']);
        //     $ibm->expiresAfter(5);
        //     $cache->save($ibm);
        //     dump('ibm laptop from database..');
        // }
        
        // if(!$dell->isHit()){
        //     $dell_from_db = 'dell laptop';
        //     $dell->set($dell_from_db);
        //     $dell->tag(['computers', 'laptops', 'dell']);
        //     $dell->expiresAfter(5);
        //     $cache->save($dell);
        //     dump('dell laptop from database..');
        // }
        
        // if(!$apple->isHit()){
        //     $apple_from_db = 'apple laptop';
        //     $apple->set($apple_from_db);
        //     $apple->tag(['computers', 'laptops', 'apple']);
        //     $apple->expiresAfter(5);
        //     $cache->save($apple);
        //     dump('apple laptop from database..');
        // }

        // // $cache->clear();
        // $cache->invalidateTags(['apple']);

        // dump($acer->get());
        // dump($ibm->get());
        // dump($dell->get());
        // dump($apple->get());

        $video = new \stdClass();

        $video->title = 'Funny Movie';
        $video->category = "funny";
        
        $event = new VideoCreatedEvent($video);


        $this->dispatcher->dispatch($event, 'video.created.event');

        $translated = $translator->trans('some.key');
        dump($translated);
        dump($request->getLocale());
        
        return $this->render('home.html.twig');
    }
}


// bin/console doctrine:query:sql "INSERT INTO user (id, email, roles, password) VALUES (nextval('user_id_seq'), 'admin@admin.com', '[\"ROLE_ADMIN\"]', '\$argon2id\$v=19\$m=65536,t=4,p=1\$BQG+jovPcunctc30xG5PxQ\$TiGbx451NKdo+g9vLtfkMy4KjASKSOcnNxjij4gTX1s')"