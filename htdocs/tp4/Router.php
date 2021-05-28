<?php


class Router
{
    function process()
    {
        $base_uri = $_SERVER["REQUEST_URI"];
        $str = file_get_contents('tp4/routes.json');
        $json = json_decode($str);
        $uri = "";
        foreach ($json as $value) {
            if($base_uri == $value->{"path"}) {
                $uri = $value;
            }
        }

        /**
         * ex http://localhost/
         *
         * $uri = /
         */

        /**
         * ex http://localhost/catalog
         *
         * $uri = /catalog
         */

        /**
         * ex http://localhost/catalog/product
         *
         * $uri = /catalog/product
         */

        /**
         * mapping entre $uri et routes.json
         * Prevoir route non connue => 404
         */

        if($uri != NULL) {
            $controller = $uri->{'controller'};
            $cont_method = explode("@", $controller);

            $a = 'app\Controller\\' . $cont_method[0];
            $b = new $a;
            $s = "" . $cont_method[1];

            echo $b->$s();
        } else {
            http_response_code(404);
            echo 404;
        }



        /**
         * instance controller de la route appel de la methode
         */

    }
}