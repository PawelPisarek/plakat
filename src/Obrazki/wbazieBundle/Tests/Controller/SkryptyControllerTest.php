<?php

namespace Obrazki\wbazieBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SkryptyControllerTest extends WebTestCase
{
    public function testOdwroc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/odwroc/{id}');
    }

    public function testCrop()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crop/{id}');
    }

}
