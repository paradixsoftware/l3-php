<?php


namespace app\Entity\repository;


abstract class AbstractRepository implements RepositoryInterface
{
    private $connection;

    function __construct()
    {
        $this->connection = new \database();
    }

    protected function getConnexion() {
        return $this->connection;
    }
}