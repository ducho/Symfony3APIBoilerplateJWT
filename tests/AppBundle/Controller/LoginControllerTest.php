<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;

class LoginControllerTest extends WebTestCase
{
    protected function setUp()
    {
        $mock = new MockHandler([new Response(200, [])]);
        $handler = HandlerStack::create($mock);
        $this->client = new Client(['handler' => $handler]);
	}

	public function testNewToken()
	{
        $response = $this->client->post('/api/token', [
            'auth' => [
                'admin',
                'adminpass'
            ],
            'json' => [
                'token' => 'my_token',
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());
	}
}
