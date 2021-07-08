<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MatchsRepository;
use App\Repository\PronosticsRepository;

class MatchController extends AbstractController
{
    public function home(MatchsRepository $matchsRepository, PronosticsRepository $pronosticsRepository) {
        $matchs = $matchsRepository->findAll();
        $user = $this->getUser();
        $array = [];

        if($user != NULL) {
            $array = $pronosticsRepository->findBy(['user_id' => $user->getId()]);
        }

        return $this->render("match.html.twig", ['matchlist' => $matchs, 'prono_list' => $array]);
    }

}