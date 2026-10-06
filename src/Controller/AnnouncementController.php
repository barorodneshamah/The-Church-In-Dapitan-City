<?php

namespace App\Controller;

use App\Entity\Announcement;
use App\Repository\AnnouncementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class AnnouncementController extends AbstractController
{
    #[Route('/announcements', name: 'app_announcements')]
    public function index(AnnouncementRepository $repo): Response
    {
        return $this->render('announcement/index.html.twig', [
            'announcements' => $repo->findActiveOrderedByDate(),
            'calendar'      => $this->buildCalendar(),
        ]);
    }

    private function buildCalendar(): array
    {
        $today     = new \DateTimeImmutable('today');
        $firstDay  = $today->modify('first day of this month');
        $lastDay   = $today->modify('last day of this month');
        $startDow  = (int) $firstDay->format('w'); // 0=Sun
        $daysInMonth = (int) $lastDay->format('j');

        // Recurring meetings keyed by day-of-week (0=Sun…6=Sat)
        $recurring = [
            0 => [
                ['name' => "Lord's Table",   'time' => '9:30 am'],
                ['name' => "Children's",     'time' => '9:30 am'],
                ['name' => 'Fellowship',     'time' => '11:00 am'],
            ],
            2 => [
                ['name' => 'Prayer Meeting', 'time' => '7:30 pm'],
            ],
            3 => [
                ['name' => 'College Mtg',   'time' => '6:00 pm'],
            ],
            6 => [
                ['name' => "Young People's", 'time' => '6:00 pm'],
            ],
        ];

        // Build weeks array (each week = 7 cells, null = empty padding)
        $weeks = [];
        $week  = array_fill(0, $startDow, null); // leading empty cells

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date   = $firstDay->modify("+{$day} days")->modify('-1 day');
            $dow    = (int) $date->format('w');
            $isToday = ($day === (int) $today->format('j'));

            $week[] = [
                'day'     => $day,
                'date'    => $date->format('Y-m-d'),
                'isToday' => $isToday,
                'events'  => $recurring[$dow] ?? [],
            ];

            if (count($week) === 7) {
                $weeks[] = $week;
                $week    = [];
            }
        }

        // Trailing empty cells
        if (!empty($week)) {
            while (count($week) < 7) {
                $week[] = null;
            }
            $weeks[] = $week;
        }

        return [
            'month_name' => $today->format('F Y'),
            'weeks'      => $weeks,
        ];
    }

    #[Route('/announcements/{id}/download', name: 'app_announcement_download', requirements: ['id' => '\d+'])]
    public function download(
        Announcement $announcement,
        #[Autowire('%kernel.project_dir%')] string $projectDir
    ): Response {
        if (!$announcement->getAttachmentFilename()) {
            throw new NotFoundHttpException('No attachment for this announcement.');
        }

        $filePath = $projectDir . '/public/uploads/announcements/' . $announcement->getAttachmentFilename();

        if (!file_exists($filePath)) {
            throw new NotFoundHttpException('File not found.');
        }

        $response = new BinaryFileResponse($filePath);
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $announcement->getAttachmentOriginalName() ?? $announcement->getAttachmentFilename()
        );

        return $response;
    }
}
