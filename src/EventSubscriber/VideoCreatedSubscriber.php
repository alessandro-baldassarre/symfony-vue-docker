<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onVideoCreatedEvent($event): void
    {
        dump($event->video->title);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'video.created.event' => 'onVideoCreatedEvent',
        ];
    }
}
