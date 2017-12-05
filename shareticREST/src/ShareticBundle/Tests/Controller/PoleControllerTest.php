<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PoleControllerTest extends WebTestCase
{
    public function testRequest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/');
        $crawler = $client->request('GET', '/api/poles/');
        $crawler = $client->request('GET', '/api/pole/1/formations/');

    }
}
