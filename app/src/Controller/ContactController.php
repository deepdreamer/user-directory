<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
}
