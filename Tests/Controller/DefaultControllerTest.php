<?php

namespace Rombit\FadeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    /**
     * @group fadebundle
     */
    public function testStart()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fade/start');

        $this->assertContains('ok', $client->getResponse()->getContent());


    }

    /**
     * @group fadebundle
     */
    public function testStop()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fade/stop');

        $this->assertContains('ok', $client->getResponse()->getContent());
    }

    /**
     * @group fadebundle
     */
    public function testUp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fade/up');

        $this->assertContains('ok', $client->getResponse()->getContent());
    }

    /**
     * @group fadebundle
     */
    public function testdown()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fade/down');

        $this->assertContains('ok', $client->getResponse()->getContent());
    }
}
