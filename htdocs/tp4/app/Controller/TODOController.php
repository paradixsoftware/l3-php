<?php


namespace app\Controller;


use GuzzleHttp\Client;

class TODOController
{
    public function home() {
        $client = new Client();
        $client->get("https://jsonplaceholder.typicode.com/todos");

        var_dump($client);
    }
}