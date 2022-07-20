<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Video;
use App\Entity\Pdf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InheritanceEntitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i<=2  ; $i++) { 
            $author = new Author;
            $author->setName('author name'. $i);
            $manager->persist($author);

            for ($j=1; $j<=2  ; $j++) { 
                $pdf = new Pdf;
                $pdf->setFilename('pdf name'. $j);
                $pdf->setDescription('pdf description'. $j);
                $pdf->setSize(5454);
                $pdf->setPageNumber(5454);
                $pdf->setOrientation('portrait');
                $pdf->setAuthor($author);
                $manager->persist($pdf);
            }

            for ($k=1; $k<=2  ; $k++) { 
                $video = new Video;
                $video->setFilename('video name'. $k);
                $video->setDescription('video description'. $k);
                $video->setSize(5454);
                $video->setFormat('mp4');
                $video->setDuration(1234);
                $video->setAuthor($author);
                $manager->persist($video);
            }
        }
        
        $manager->flush();
    }
}
