<?php

namespace App\Controller;

use App\Repository\RelatedLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RelatedLinksController extends AbstractController
{
    #[Route('/related-links', name: 'app_related_links')]
    public function index(RelatedLinkRepository $repo): Response
    {
        return $this->render('related_links/index.html.twig', [
            'links' => $repo->findActiveOrdered(),
        ]);
    }
}
