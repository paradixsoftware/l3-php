<?php


class Connexion
{
    public static function getConnexion() {
        return new database();
    }
}