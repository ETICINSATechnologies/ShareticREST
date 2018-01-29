<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MCQControllerTest extends WebTestCase
{
    public function testRequest()
    {
        echo "\nMCQControllerTest.php - testRequest()\n";
        $client = static::createClient();

        $reqGET = array("/api/mcq/0");

        for($i=0;$i<sizeof($reqGET);$i++){
            echo $reqGET[$i];
            $client->request('GET', $reqGET[$i]);
            $response = $client->getResponse();
            $this->assertSame(200, $response->getStatusCode());
            $this->assertSame('application/json', $response->headers->get('Content-Type'));
            $this->assertNotEmpty($response->getContent());
            echo " OK\n";
        }

        $reqPOST = array("/api/mcq/create","/api/mcq/0/validate");

        for($i=0;$i<sizeof($reqPOST);$i++){
            echo $reqPOST[$i];
            $client->request('POST', $reqPOST[$i]);
            $response = $client->getResponse();
            $this->assertSame(200, $response->getStatusCode());
            $this->assertSame('application/json', $response->headers->get('Content-Type'));
            $this->assertNotEmpty($response->getContent());
            echo " OK\n";
        }
    }
}
