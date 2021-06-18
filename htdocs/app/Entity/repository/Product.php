<?php


namespace app\Entity\repository;

use app\Entity\EntityInterface;

class Product extends AbstractRepository implements RepositoryInterface
{
    public function findAll() : array {
        $this->getConnexion()->create_table("Product");
        return $this->getConnexion()->select_all("Product");
    }

    public function find(int $id) : EntityInterface {
        $list = $this->getConnexion()->select_all("Product");
        $tr = NULL;
        foreach ($list as $p) {
            if($p->getId() == $id) {
                $tr = $p;
            }
        }
        return $tr;
    }

    public function findBy($name, $value) : array {
        $list = $this->getConnexion()->select_all("Product");
        $toReturn = [];
        foreach ($list as $p) {
            if($p->getName() == $name) {
                array_push($toReturn, $p);
            }

            if($p->getPrice() == $value) {
                array_push($toReturn, $p);
            }
        }
        return $toReturn;
    }
}