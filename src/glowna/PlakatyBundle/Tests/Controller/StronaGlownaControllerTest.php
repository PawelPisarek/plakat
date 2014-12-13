<?php

namespace glowna\PlakatyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StronaGlownaControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testWizytowka()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/wizytowka');
    }

    public function testPlakat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/plakat');
    }

}
