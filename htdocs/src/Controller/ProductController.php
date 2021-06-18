<?php


namespace App\Controller;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{

    public function view(ProductRepository  $productRepository) : Response {
        $args = $productRepository->findAll();

        echo('<table class="styled-table">');
        echo("<th>id</th>");
        echo("<th>name</th>");
        echo("<th>price</th>");

        foreach ($args as $a) {
            $id = $a->getId();
            $name = $a->getName();
            $price = $a->getPrice();

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $price . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        return new Response("");
    }
}