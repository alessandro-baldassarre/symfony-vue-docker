<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        // $category = new Category();
        // $category->setName('Test Fixture');
        // $manager->persist($category);
        // $manager->flush();

        $query = $manager->createQuery(
            'SELECT c
            FROM App\Entity\Category c'
        );
        $categories =  $query->getResult();


        for ($i = 0; $i < 10; $i++) {
            $faker = Factory::create();
            $product = new Product();
            $product->setName($faker->word());
            $product->setPrice($faker->randomNumber(3, false));
            $product->setDescription($faker->word());
            $product->setCategory($faker->randomElement($categories));
            $manager->persist($product);
    
            $manager->flush();
        }
    }
}
