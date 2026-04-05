<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(
        ContactRepository $contactRepository,
        PaginatorInterface $paginator,
        Request $request,
    ): Response {
        $contacts = $paginator->paginate(
            $contactRepository->createQueryBuilder('c')->orderBy('c.surname', 'ASC'),
            $request->query->getInt('page', 1),
            10,
        );

        return $this->render('contact/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }

    #[Route('/{slug}', name: 'app_contact_edit', methods: ['GET', 'POST'])]
    public function edit(
        #[MapEntity(mapping: ['slug' => 'slug'])] Contact $contact,
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        $backUrl = $request->query->get('back', $request->headers->get('referer', $this->generateUrl('app_home')));

        if ($form->isSubmitted() && $form->isValid()) {
            $contact->updateSlug();
            $entityManager->flush();

            return $this->redirectToRoute('app_contact_edit', ['slug' => $contact->getSlug(), 'back' => $backUrl]);
        }

        return $this->render('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
            'backUrl' => $backUrl,
        ]);
    }

    #[Route('/{slug}/delete', name: 'app_contact_delete', methods: ['POST'])]
    public function delete(
        #[MapEntity(mapping: ['slug' => 'slug'])] Contact $contact,
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {
        if ($this->isCsrfTokenValid('delete-' . $contact->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_home');
    }
}
