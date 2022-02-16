<?php

namespace App\Tests\application;

use App\Tests\src\InputDataGenerator;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class TargetControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testValidResponse(): void
    {
        $content = json_encode(InputDataGenerator::validData());
        $this->client->request('POST', '/radar', [], [], [], $content);
        $this->assertResponseIsSuccessful();
        echo $this->client->getResponse()->getContent();
    }

    public function testInputIssue1(): void
    {
        $content = [
            'protocols' => [
                'closest-enemies',
                'avoid-mech',
            ],
            'scan' => [
                [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 1
                    ],
                    'enemies' => [
                        'type' => 'mech',
                        'number' => 1
                    ]
                ], [
                   'coordinates' => [
                       'x' => 0,
                       'y' => 10
                   ],
                   'enemies' => [
                       'type' => 'soldier',
                       'number' => 1
                   ]
                ], [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 99
                    ],
                    'enemies' => [
                        'type' => 'mech',
                        'number' => 1
                    ]
                ],
            ],
        ];

        $this->client->request('POST', '/radar', [], [], [], json_encode($content));
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testInvalidInputResponse(): void
    {
        $content = json_encode(InputDataGenerator::emptyEnemiesData());
        $this->client->request('POST', '/radar', [], [], [], $content);
        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }

    public function testEmptyInputResponse(): void
    {
        $this->client->request('POST', '/radar');
        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }
}
