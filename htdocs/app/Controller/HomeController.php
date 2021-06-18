<?php

namespace app\Controller;

use GuzzleHttp\Client;

class HomeController extends AbstractController
{

    public function home()
    {
        $guzzle = new Client();
        echo $this->render('home.phtml', []);
    }

}