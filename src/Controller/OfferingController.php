<?php

namespace App\Controller;

use App\Repository\OfferingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OfferingController extends AbstractController
{
    #[Route('/offerings', name: 'app_offerings')]
    public function index(OfferingRepository $repo): Response
    {
        return $this->render('offering/index.html.twig', [
            'offerings' => $repo->findActiveOrdered(),
        ]);
    }
}
