<?php

namespace App\Tests\application;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TargetControllerTest extends WebTestCase
{
    /**
     * @var KernelBrowser
     */
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testValidResponse(): void
    {
        $this->client->request('POST', '/radar');
        $this->assertResponseIsSuccessful();
    }

    public function testNoTargetsFoundResponse(): void
    {
        $this->client->request('POST', '/radar');
        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }

    public function testEmptyInputResponse(): void
    {
        $this->client->request('POST', '/radar');
        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }
}
