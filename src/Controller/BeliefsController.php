<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BeliefsController extends AbstractController
{
    #[Route('/beliefs', name: 'app_beliefs')]
    public function index(): Response
    {
        return $this->render('beliefs/index.html.twig');
    }
}
