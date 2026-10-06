<?php

namespace App\Controller;

use App\Entity\GalleryItem;
use App\Repository\GalleryItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class GalleryController extends AbstractController
{
    #[Route('/gallery', name: 'app_gallery')]
    public function index(GalleryItemRepository $repo): Response
    {
        return $this->render('gallery/index.html.twig', [
            'items' => $repo->findPhotos(),
            'current_category' => null,
            'categories' => GalleryItem::CATEGORIES,
        ]);
    }

    #[Route('/gallery/{category}', name: 'app_gallery_category')]
    public function category(string $category, GalleryItemRepository $repo): Response
    {
        if (!array_key_exists($category, GalleryItem::CATEGORIES)) {
            throw new NotFoundHttpException('Category not found.');
        }

        return $this->render('gallery/category.html.twig', [
            'photos' => $repo->findPhotos($category),
            'testimonies' => $repo->findTestimonies($category),
            'current_category' => $category,
            'category_label' => GalleryItem::CATEGORIES[$category],
            'categories' => GalleryItem::CATEGORIES,
        ]);
    }
}
