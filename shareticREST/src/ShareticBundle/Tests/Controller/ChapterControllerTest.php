<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChapterControllerTest extends WebTestCase
{
    public function testRequest()
    {
        echo "\nChapterControllerTest.php - testRequest()\n";
        $client = static::createClient();

        $reqGET = array("/api/chapter/0");

        for($i=0;$i<sizeof($reqGET);$i++){
            echo $reqGET[$i];
            $client->request('GET', $reqGET[$i]);
            $response = $client->getResponse();
            $this->assertSame(200, $response->getStatusCode());
            $this->assertSame('application/json', $response->headers->get('Content-Type'));
            $this->assertNotEmpty($response->getContent());
            echo " OK\n";
        }

        $reqPOST = array("/api/chapter/0/edit","/api/chapter/0/add");

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
