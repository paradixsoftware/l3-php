<?php

use app\Entity\Product;

class database {
    private $connection;

    public function __construct()
    {
        $host = "mysql";
        $database = "eurovent";
        $user = "www-data";
        $pass = "www-password";

        $this->connection = new PDO('mysql:host=' . $host . ";dbname=" . $database, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create_table($table) {
        $query = $this->connection->prepare("CREATE TABLE IF NOT EXISTS ".$table."(id int(255) KEY NOT NULL AUTO_INCREMENT, name varchar(255), price int(255))");
        $query->execute();
    }

    public function insert_to_product($n, $price) {
        $query_string = "INSERT INTO Product(name, price) VALUES(".$n.",".$price.")";

        $query = $this->connection->prepare($query_string);
        $query->execute();
    }

    public function select_all($table) {
        $query = $this->connection->prepare("SELECT * FROM " . $table);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $products = [];

        foreach ($results as $r) {
             $id = $r["id"];
             $name = $r["name"];
             $price = $r["price"];

             array_push($products, new Product($id, $name, $price));
        }

        return $products;
    }
}
