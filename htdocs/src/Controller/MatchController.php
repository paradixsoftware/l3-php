<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MatchsRepository;
use App\Repository\PronosticsRepository;

class MatchController extends AbstractController
{
    public function home(MatchsRepository $matchsRepository, PronosticsRepository $pronosticsRepository) {
        $matchs = $matchsRepository->findAllJson();
        $user = $this->getUser();
        $array = [];

        if($user) {
            $array = $pronosticsRepository->findBy(['user_id' => $user->getId()]);
        }

        $page = 1;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $nbpages = ceil(sizeof($matchs) / 5);

        if($page > $nbpages) {
            $page = $nbpages;
        }

        $match_array = [];

        foreach ($matchs as $m) {
            if($m->getId() >= ($page * 5) - 5 && $m->getId() <= 5*$page) {
                array_push($match_array, $m);
            }
        }

        return $this->render("match.html.twig", ['matchlist' => $match_array, 'prono_list' => $array, 'nbpage' => $nbpages, 'page' => $page]);
    }

}