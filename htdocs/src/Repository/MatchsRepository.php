<?php

namespace App\Repository;

use App\Entity\Matchs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use GuzzleHttp\Client;

/**
 * @method Matchs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matchs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matchs[]    findAll()
 * @method Matchs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matchs::class);
    }

    public function findAllJson() {
        $client = new Client();
        $response = $client->get("http://mathys-pomier.fr:4000/euro");
        $retour = [];
        $body = $response->getBody();
        $rep = json_decode($body, true);
        $index = 1;

        foreach($rep as $headers) {
            $matchs = new Matchs();
            $matchs->setId($index);

            $from = \DateTime::createFromFormat("Y-m-d H:i:s", $headers['date']);

            $matchs->setDate($from);
            $matchs->setDomicile($headers["teams"]["domicile"]);
            $matchs->setExterieur($headers["teams"]["exterieur"]);
            if(array_key_exists("scores", $headers)) {
                $matchs->setScoreDomicile($headers["scores"]["domicile"]);
                $matchs->setScoreExterieur($headers["scores"]["exterieur"]);

                $matchs->setTiraubut($headers["scores"]["tireaubut"]);
                if($headers["scores"]["tireaubut"])
                    $matchs->setWinner($headers["scores"]["winner"]);
            }

            array_push($retour, $matchs);
            $index++;
        }

        return $retour;
    }

    // /**
    //  * @return Matchs[] Returns an array of Matchs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matchs
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
