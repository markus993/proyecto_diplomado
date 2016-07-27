<?php

namespace Uniajc\sgdepBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/materias/sesiones/7');

        $this->assertTrue($crawler->filter('html:contains("false")')->count() > 0);
    }
}
