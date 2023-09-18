<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/movies', name: 'MoviesIndex')]
    public function index(/*MovieRepository $movieRepository*/): Response
    {
        /*$movies = $movieRepository->findAll();*/
        /*$this->entityManager->getRepository(Movie::class)
            ->count(['release_year' => 2008]);*/
        $movies = $this->entityManager->getRepository(Movie::class)->findAll();
        return $this->render('index.html.twig', [
            'titles' => $movies
        ]);
    }
    #[Route('/movie/{slug}', name: 'MoviesShow', defaults: ['slug' => null], methods: ['GET', 'HEAD'])]
    public function show($slug): Response
    {
        return $this->render('index.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug))
        ]);
    }
}
