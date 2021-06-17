<?php


namespace app\Controller;


abstract class AbstractController
{
    private $path = "tp4/app/";

    function render(string $template, array $args = []) {
        include($this->path.$template);
        extract($args);
    }
}