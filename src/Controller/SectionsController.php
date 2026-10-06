<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SectionsController extends AbstractController
{
    #[Route('/sections', name: 'app_sections')]
    public function index(): Response
    {
        return $this->render('sections/index.html.twig');
    }
}
