<?php


namespace app\Entity;


class Customer
{
    private $id;
    private $name;
    private $produit;

    /**
     * Customer constructor.
     * @param $id
     * @param $name
     * @param $produid
     */
    public function __construct($id, $name, $produid)
    {
        $this->id = $id;
        $this->name = $name;
        $this->produit = $produid;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
    }



}