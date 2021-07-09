<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PronosticsRepository;
use App\Entity\Pronostics;

class PronoController extends AbstractController
{
    /**
     * @Route("/prono", name="prono")
     */
    public function index(Request $request, PronosticsRepository $repo): Response
    {
        $PronoManager = $this->getDoctrine()->getManager();
        $prono = $repo->findOneBy(['user_id' => $_GET["user_id"], 'match_id' => $_GET["match_id"]]);

        if(!$prono) $prono = new Pronostics();
        $prono->setMatchId($_GET["match_id"]);
        $prono->setUserId($_GET["user_id"]);
        $prono->setScoreDomicile($request->request->get('p_dom'));
        $prono->setScoreExterieur($request->request->get('p_ext'));
        $prono->setDate(new \DateTime());

        $PronoManager->persist($prono);
        $PronoManager->flush();

        return $this->redirectToRoute("matchs");
    }
}
