<?php


namespace App\Controller;
use App\Entity\Messages;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\PronosticsRepository;
use App\Repository\MatchsRepository;

class ContactController extends AbstractController
{
    public function contact(Request $request) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $message = new Messages();
        $user = $this->getUser();

        $form = $this->createFormBuilder($message)
            ->add("message_content", TextType::class, ['label' => 'Votre message', 'attr' => [ 'class' => 'message']])
            ->add("save", SubmitType::class, ['label' => 'envoyer', 'attr' => [ 'class' => 'button_c']])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $message->setUserId($user->getId());
            $message->setDate(new \DateTime());

            $em->persist($message);
            $em->flush();
        }
        return $this->render("contact.html.twig", [
            'form' => $form->createView()
        ]);
    }
}