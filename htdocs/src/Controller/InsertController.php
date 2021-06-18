<?php


namespace App\Controller;


use App\Entity\Customer;
use App\Entity\Product;
use App\Repository\CustomerRepository;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InsertController extends AbstractController
{
    public function createProduct(Request $req) : Response {
        $prod = new Product();


        $form = $this->createFormBuilder($prod)
            ->add("name", TextType::class)
            ->add("price", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Product'])
            ->getForm();
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($prod);
            $em->flush();
        }
        return $this->render('product.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function createCustomer(Request $req) : Response {
        $customer = new Customer();

        $form = $this->createFormBuilder($customer)
            ->add("name", TextType::class)
            ->add("age", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Product'])
            ->getForm();
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($customer);
            $em->flush();
        }
        return $this->render('Customer.html.twig', [
            'form' => $form->createView()
        ]);
    }
}