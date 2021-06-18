<?php


namespace app\Controller;


use app\Entity\Product;

class CatalogController extends AbstractController
{
    function view() {
        $repo = new \app\Entity\repository\Product();
        $list_product = $repo->findAll();


        echo $this->render('catalogues/values.phtml', ['products' => $list_product]);
    }

    function viewProduct() {

    }
}