<?php

namespace glowna\PlakatyBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class panelControllerTest extends WebTestCase
{
    public function testWszystkiezamowienia()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/wszystkieZamowienia');
    }

}
