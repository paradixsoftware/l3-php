<?php


namespace app\Controller;


class CatalogController extends AbstractController
{
    function view() {
        $list_product = ["Clé à molette", "tournevis", "vis"];
        $this->render("templates/catalogues/view.phtml", ['products' => $list_product]);
    }

    function viewProduct() {
        return "Hello product";
    }
}