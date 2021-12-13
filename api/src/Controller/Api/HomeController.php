<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    #[Route(path: '', name: 'home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->json([
            'name' => 'JSON API',
            'version' => '1.0',
        ]);
    }
}
