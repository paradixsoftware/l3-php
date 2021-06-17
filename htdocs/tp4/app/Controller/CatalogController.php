<?php


namespace app\Controller;


use app\Entity\Product;

class CatalogController extends AbstractController
{
    function view() {
        $list_product = [];

        $list_product[] = new Product('Lampe', 10);
        $list_product[] = new Product('Tapis', 100);
        echo $this->render('catalogues/view.phtml', ['products' => $list_product]);
    }

    function viewProduct() {

    }
}