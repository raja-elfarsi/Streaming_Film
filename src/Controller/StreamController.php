<?php

namespace App\Controller;

use App\Entity\Stream;
use App\Form\StreamType;
use App\Repository\StreamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stream")
 */
class StreamController extends AbstractController
{
    /**
     * @Route("/", name="stream_index", methods={"GET"})
     */
    public function index(StreamRepository $streamRepository): Response
    {
        return $this->render('stream/index.html.twig', [
            'streams' => $streamRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="stream_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stream = new Stream();
        $form = $this->createForm(StreamType::class, $stream);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stream);
            $entityManager->flush();

            return $this->redirectToRoute('stream_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stream/new.html.twig', [
            'stream' => $stream,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="stream_show", methods={"GET"})
     */
    public function show(Stream $stream): Response
    {
        return $this->render('stream/show.html.twig', [
            'stream' => $stream,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stream_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Stream $stream, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StreamType::class, $stream);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('stream_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('stream/edit.html.twig', [
            'stream' => $stream,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="stream_delete", methods={"POST"})
     */
    public function delete(Request $request, Stream $stream, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stream->getId(), $request->request->get('_token'))) {
            $entityManager->remove($stream);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stream_index', [], Response::HTTP_SEE_OTHER);
    }
}
