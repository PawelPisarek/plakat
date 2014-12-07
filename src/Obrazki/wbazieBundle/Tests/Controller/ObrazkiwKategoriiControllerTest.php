<?php

namespace Obrazki\wbazieBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ObrazkiwKategoriiControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/{id}.html');
    }

}
