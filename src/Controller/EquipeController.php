<?php


namespace App\Controller;


use App\Entity\Equipe;
use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EquipeController extends AbstractController
{
    private $equipeRepository;

    public function __construct(EquipeRepository $equipeRepository)
    {
        $this->equipeRepository = $equipeRepository;
    }

    /**
     * @Route("/api/equipes", methods={"GET"})
     */
    public function getAll()
    {
        $equipes = $this->equipeRepository->findAll();
        return $this->json($equipes, 200, [], ['groups' => 'equipe:read']);
    }

    /**
     * @Route("/api/equipe/{id}", methods={"GET"})
     */
    public function show(Equipe $equipe, SerializerInterface $serializer)
    {
        return $this->json($equipe, 200, [], ['groups' => 'equipe:show']);
    }
}
