<?php

declare(strict_types=1);

namespace App\Tests\Functional\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TodoListTest extends WebTestCase
{
    /**
     * @throws \JsonException
     */
    public function testAllGet(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/todo-lists');

        self::assertEquals(200, $client->getResponse()->getStatusCode());

        $content = $client->getResponse()->getContent();

        self::assertNotFalse($content);
        self::assertJson($content);

        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        self::assertIsArray($data);
        self::assertCount(2, $data);
        self::assertIsArray($data[0]);
        self::assertCount(4, $data[0]);
    }

    public function testAllPost(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/todo-lists');

        self::assertEquals(405, $client->getResponse()->getStatusCode());
    }
}
