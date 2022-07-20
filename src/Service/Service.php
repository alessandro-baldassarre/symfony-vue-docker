<?php 

namespace App\Service;

use App\Service\SecondService;
use Doctrine\ORM\Event\PostFlushEventArgs;

class Service {

    // use OptionalServiceTrait;

    // public $logger;
    // public $my;

    // public function __construct($service)
    // {
    //     dump($service);
    // }

    // public function someAction ()
    // {
    //     // dump($this->logger);
    //     // dump($this->my);
    // }

    // public function someAction()
    // {
    //     dump($this->service->doSomething2());
    // }

    public function postFlush(PostFlushEventArgs $args){
        dump("postFlush");
        dump($args);
    }


}