<?php

namespace app\Entity\repository;

use app\Entity\EntityInterface;

interface RepositoryInterface
{
    public function findAll() : array;

    public function find(int $id) : EntityInterface;

    public function findBy($name, $value) : array;
}