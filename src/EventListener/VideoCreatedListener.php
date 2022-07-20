<?php 

namespace App\EventListener;

class VideoCreatedListener{

    public function onVideoCreatedEvent($event){
        
        dump($event->video->title);

    }
}