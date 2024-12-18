<?php

namespace App\Controller;

use App\Entity\Note;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

class NoteController extends AbstractController
{
    //gets all sorted data from db and outputs json via serializer
    #[Route('/notes', name: 'note_list', methods: ['GET'], format: 'json')]
    public function list(EntityManagerInterface $entityManager, EncoderInterface $serializer): JsonResponse
    {
        $notes = $entityManager->getRepository(Note::class)->findAllSorted();

        return new JsonResponse($serializer->encode($notes, 'json'), 200, ["Content-Type" => "application/json"], true);
    }
    //uses serializer (and its setting in entity file) to format the json
    //By including the entity as a parameter the controller will automatically try to populate
    //the object, throwing not found json if not found
    #[Route('/notes/{id}', name: 'note_detail', methods: ['GET'], format: 'json')]
    public function detail(Note $note): JsonResponse
    {
        return $this->json($note);
    }

    #[Route('/notes/{id}', methods: ['DELETE'], format: 'json')]
    public function delete(Note $note, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($note);
        $entityManager->flush();

        return new Response('Note deleted successfully');
    }

    //will try to populate entity object with form data, throwing 422 json error if validation failed or 400 if malformed request then saving
    #[Route('/notes', name: 'create_note', methods: ['POST'], format: 'json')]
    public function createNote(#[MapRequestPayload(serializationContext: ['basic'])] Note $note, EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist($note);
        $entityManager->flush();

        return new Response('Note created successfully');
    }
}
