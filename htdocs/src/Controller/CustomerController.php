<?php


namespace App\Controller;


use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends AbstractController
{
    public function view(CustomerRepository $customerRepository) : Response {
        $args = $customerRepository->findAll();

        echo('<table class="styled-table">');
        echo("<th>id</th>");
        echo("<th>name</th>");
        echo("<th>price</th>");

        foreach ($args as $a) {
            $id = $a->getId();
            $name = $a->getName();
            $age = $a->getAge();

            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $age . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        return new Response("");
    }
}