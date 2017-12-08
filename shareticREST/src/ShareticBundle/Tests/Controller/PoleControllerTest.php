<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PoleControllerTest extends WebTestCase
{
    public function testRequest()
    {
        echo "\nPoleControllerTest.php - testRequest()\n";
        $client = static::createClient();

        $reqGET = array("/api/poles/","/api/pole/0/formations/");

        for($i=0;$i<sizeof($reqGET);$i++){
            echo $reqGET[$i];
            $client->request('GET', $reqGET[$i]);
            $response = $client->getResponse();
            $this->assertSame(200, $response->getStatusCode());
            $this->assertSame('application/json', $response->headers->get('Content-Type'));
            $this->assertNotEmpty($response->getContent());
            echo " OK\n";
        }
    }
}
