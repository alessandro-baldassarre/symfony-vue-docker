<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {   
        for ($i = 0; $i < 10; $i++) {
            $faker = Factory::create();
            $category = new Category();
            $category->setName($faker->word());
            $manager->persist($category);
    
            $manager->flush();
        }
    }
}
