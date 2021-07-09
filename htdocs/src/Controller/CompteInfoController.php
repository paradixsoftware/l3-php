<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PronosticsRepository;
use App\Repository\MatchsRepository;
use App\Entity\User;

class CompteInfoController extends AbstractController
{
    public function get_info(PronosticsRepository $repo, MatchsRepository $matchsRepository) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $matchs = $matchsRepository->findAllJson();
        $user = $this->getUser();

        $pronos = $repo->findBy(array('user_id' => $user->getId()));
        $points = 0;

        $page = 1;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $nbpages = ceil(sizeof($pronos) / 5);

        if($page > $nbpages) {
            $page = $nbpages;
        }

        $prono_array = [];

        foreach ($pronos as $p)
            if($p->getId() >= ($page * 5) - 5 && $p->getId() <= 5*$page)
                array_push($prono_array, $p);


        foreach ($pronos as $p) {

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

        return $this->render("info.html.twig", ['prono' => $prono_array, 'matchlist' => $matchs, 'pts' => $points, 'nbpage' => $nbpages, 'page' => $page]);
    }
}