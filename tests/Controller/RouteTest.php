<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\HttpFoundation\Response;

class RouteTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testRoute($url)
    {
        $client= static::createClient();
        $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertResponseStatusCodeSame(HttpFoundationResponse::HTTP_OK);
    }

    public function provideUrls()
    {
        return array(
            array('/login'),
            array('/'),
            array('/inscription'),
        );
    }
}