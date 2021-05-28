<?php


class Voiture
{
    private $couleur;
    private $puissance;
    private $vitesse;
    const roues = 4;

    /**
     * Voiture constructor.
     * @param $couleur
     * @param $puissance
     * @param $vitesse
     */
    public function __construct($couleur, $puissance, $vitesse)
    {
        $this->couleur = $couleur;
        $this->puissance = $puissance;
        $this->vitesse = $vitesse;
    }

    public function accelerer() {
        $this->vitesse += 1;
    }

    public function ralentir() {
        $this->vitesse -= 1;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * @return mixed
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * @param mixed $puissance
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
    }

    /**
     * @return mixed
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * @param mixed $vitesse
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;
    }


}