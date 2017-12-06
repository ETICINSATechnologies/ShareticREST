<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FormationControllerTest extends WebTestCase
{
    public function testRequest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/formation/0');
        $crawler = $client->request('POST', '/formation/0/addChapter');
        $crawler = $client->request('POST', '/formation/0/edit');
        $crawler = $client->request('POST', '/formation/0/rate');
        $crawler = $client->request('POST', '/formation/create');

    }
}
