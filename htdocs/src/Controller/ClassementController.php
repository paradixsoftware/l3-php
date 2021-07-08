<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PronosticsRepository;
use App\Repository\UserRepository;
use App\Repository\MatchsRepository;
use App\Entity\User;

class ClassementController extends AbstractController
{
    public function show_classement(UserRepository $userRepository, MatchsRepository $matchsRepository, PronosticsRepository $pronosticsRepository) {
        $users = $userRepository->findAll();
        $matchs = $matchsRepository->findAll();
        $values = [];

        foreach ($users as $u) {
            $pronostics = $pronosticsRepository->findBy(array('user_id' => $u->getId()));
            $points = 0;

            foreach ($pronostics as $p) {
                foreach ($matchs as $m) {
                    if($m->getId() == $p->getMatchId()) {
                        $count_for_match = 0;

                        $m_dom = $m->getScoreDomicile();
                        $m_ext = $m->getScoreExterieur();

                        $p_dom = $p->getScoreDomicile();
                        $p_ext = $p->getScoreExterieur();

                        $winner = $m_dom < $m_ext ? "EXT" : "DOM";
                        $prono_winner = $p_dom < $p_ext ? "EXT" : "DOM";

                        if($prono_winner == $winner) $count_for_match = 1;

                        if($prono_winner == "EXT") {
                            if($m_ext == $p_ext) $count_for_match = 3;
                            if($m->getDate() > new \DateTime()) $count_for_match = 0;
                        } else {
                            if($m_dom == $p_dom) $count_for_match = 3;
                            if($m->getDate() > new \DateTime()) $count_for_match = 0;
                        }

                        $points += $count_for_match;
                    }
                }
            }

            $var = [$points, $u->getEmail(), count($pronostics)];
            array_push($values, $var);
        }

        rsort($values);

        return $this->render("Classement.html.twig", [
            'values' => $values
        ]);
    }
}