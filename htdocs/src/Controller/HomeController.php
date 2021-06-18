<?php

namespace App\Controller;

use App\Entity\Test;
use App\Repository\TestRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function home(/* fait parti de la méthode 2 */TestRepository  $testRepository) : Response {
        /* méthode 1 pour récup
        $pr = $this->getDoctrine()->getRepository(Test::class);
        $products = $pr->findAll();
        $productsone = $pr->findBy(['name' => 'Tapis']);
        */

        /* méthode 2 pour récup */
        //$testRepository->findAll();



        /* création et insertion dans la bdd
         *
         * $em = $this->getDoctrine()->getManager();

        $test = new Test();
        $test->setName("Tournevis");
        $test->setPrice(30.0);

        $em->persist($test);
        $em->flush();*/

        return $this->render("test.html.twig");
    }
}