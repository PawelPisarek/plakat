<?php

namespace Obrazki\wbazieBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class trzyControllerTest extends WebTestCase
{
    public function testBlank()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Blank/{id}');
    }

    public function testStretch()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Stretch/{id}');
    }

    public function testMirror()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Mirror/{id}');
    }

    public function testCustom()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Custom/{id}');
    }

    public function testMirror2()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Mirror2/{id}');
    }

}
