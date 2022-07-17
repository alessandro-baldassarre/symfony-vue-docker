<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/task/create');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('label','Task');
    }
}
