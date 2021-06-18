<?php


namespace app\Controller;


abstract class AbstractController
{
    private $path = "app/";
    private $data = [];

    function render(string $template, array $args = []) {
        $this->data = $args;
        include $this->path . 'templates/' . $template;
    }

    function getData(string $key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }
}