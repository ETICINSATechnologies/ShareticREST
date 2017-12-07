<?php

namespace ShareticBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testRequest()
    {
        echo "\nUserControllerTest.php - testRequest()\n";
        $client = static::createClient();

        $reqGET = array("/api/user/profil","/api/user/stats","/api/user/0/profil","/api/user/0/stats","/api/user/0/badge/give");

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
