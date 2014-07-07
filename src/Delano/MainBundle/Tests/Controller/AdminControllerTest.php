<?php

namespace Delano\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testShownews()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/shownews');
    }

    public function testEditnews()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/editnews');
    }

    public function testShowmsg()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showmsg');
    }

    public function testSendmsg()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/sendmsg');
    }

    public function testShowres()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showres');
    }

    public function testEvents()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/events');
    }

    public function testUsers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users');
    }

}
