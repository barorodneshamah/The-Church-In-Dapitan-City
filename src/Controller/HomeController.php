<?php

namespace App\Controller;

use App\Repository\AnnouncementRepository;
use App\Repository\FaqRepository;
use App\Repository\GalleryItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        AnnouncementRepository $announcementRepo,
        GalleryItemRepository $galleryRepo,
        FaqRepository $faqRepo
    ): Response {
        $latestAnnouncements = array_slice($announcementRepo->findActiveOrderedByDate(), 0, 3);
        $recentPhotos = array_slice($galleryRepo->findPhotos(), 0, 6);
        $featuredFaqs = array_slice($faqRepo->findActiveOrdered(), 0, 4);

        return $this->render('home/index.html.twig', [
            'latest_announcements' => $latestAnnouncements,
            'recent_photos' => $recentPhotos,
            'featured_faqs' => $featuredFaqs,
        ]);
    }
}
