<?php


namespace App\Controller;


use App\Repository\SalleRepository;
use Symfony\Component\Routing\Annotation\Route;

class SalleController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private $salleRepository;

    public function __construct(SalleRepository $salleRepository)
    {
        $this->salleRepository = $salleRepository;
    }

    /**
     * @Route("/api/salles", methods={"GET"})
     */
    public function getAll()
    {
        $salles = $this->salleRepository->findAll();
        return $this->json($salles, 200, [], ['groups' => 'salle:read']);
    }
}
