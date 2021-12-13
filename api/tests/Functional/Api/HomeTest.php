<?php

declare(strict_types=1);

namespace App\Tests\Functional\Api;

use JsonException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @internal
 */
final class HomeTest extends WebTestCase
{
    /**
     * @throws JsonException
     */
    public function testGet(): void
    {
        $client = self::createClient();

        $client->request('GET', '/api/');

        self::assertEquals(200, $client->getResponse()->getStatusCode());

        $content = $client->getResponse()->getContent();

        self::assertNotFalse($content);
        self::assertJson($content);

        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        self::assertIsArray($data);

        self::assertEquals([
            'name' => 'JSON API',
            'version' => '1.0',
        ], $data);
    }

    public function testPost(): void
    {
        $client = self::createClient();

        $client->request('POST', '/api/');

        self::assertEquals(405, $client->getResponse()->getStatusCode());
    }
}
