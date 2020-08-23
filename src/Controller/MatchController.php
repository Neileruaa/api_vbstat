<?php


namespace App\Controller;


use App\Entity\Match;
use App\Repository\EquipeRepository;
use App\Repository\SalleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;

class MatchController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    private $equipeRepository;
    private $salleRepository;

    public function __construct(EquipeRepository $equipeRepository, SalleRepository $salleRepository)
    {
        $this->equipeRepository = $equipeRepository;
        $this->salleRepository = $salleRepository;
    }

    /**
     * @Route("/api/match", methods={"POST"})
     */
    public function newMatch(Request $request, SerializerInterface $serializer, EntityManagerInterface $em): Response
    {
        $data = json_decode($request->getContent(), true);
        $equipeA = $this->equipeRepository->find($data['equipeA']);
        $equipeB = $this->equipeRepository->find($data['equipeB']);
        $salle = $this->salleRepository->find($data['salle']);
        $match = new Match();
        $match
            ->setEquipeA($equipeA)
            ->setEquipeB($equipeB)
            ->setScoreA($data['scoreA'])
            ->setScoreB($data['scoreB'])
            ->setSalle($salle)
            ->setDate(new \DateTime($data['date']))
        ;
        $em->persist($match);
        $em->flush();
        return $this->json(['id' => $match->getId()]);
    }
}
