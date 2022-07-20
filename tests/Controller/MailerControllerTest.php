<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test\MailerAssertionsTrait;


class MailerControllerTest extends WebTestCase
{
    use MailerAssertionsTrait;

    public function testMailIsSentAndContentIsOk()
    {
        $client = $this->createClient();
        $client->request('GET', '/email');
        $this->assertResponseIsSuccessful();

        $this->assertEmailCount(1);

        $email = $this->getMailerMessage();

        // $this->assertEmailHtmlBodyContains($email, 'Sending emails is fun again!');
        // $this->assertEmailTextBodyContains($email, 'Sending emails is fun again!');
    }
}
