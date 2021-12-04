<?php

declare(strict_types=1);

namespace App\Tests\Functional\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeTest extends WebTestCase
{
    /**
     * @throws \JsonException
     */
    public function testGet(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/');

        self::assertEquals(200, $client->getResponse()->getStatusCode());
        self::assertJson($content = $client->getResponse()->getContent());

        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        self::assertEquals([
            'name' => 'JSON API',
            'version' => '1.0'
        ], $data);
    }

    public function testPost(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/');

        self::assertEquals(405, $client->getResponse()->getStatusCode());
    }
}
