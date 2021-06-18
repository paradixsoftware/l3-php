<?php


namespace app\Entity;


class Customer
{
    private $id;
    private $name;
    private $produid;

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
        $this->produid = $produid;
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
    public function getProduid()
    {
        return $this->produid;
    }

    /**
     * @param mixed $produid
     */
    public function setProduid($produid)
    {
        $this->produid = $produid;
    }



}