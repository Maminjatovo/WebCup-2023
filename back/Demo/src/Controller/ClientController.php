<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ClientController.php',
        ]);
    }

    #[Route('/api/clients', name: 'getClients', methods: ['GET'])]
    public function getClientList(ClientRepository $clientRepository, SerializerInterface $serializer): JsonResponse
    {
        $clientList = $clientRepository->findAll();
        $jsonClientList = $serializer->serialize($clientList, 'json');
        return new JsonResponse($jsonClientList, Response::HTTP_OK, [], true);
    }

    /*
    #[Route('/api/clients/{id}', name: 'detailClient', methods: ['GET'])]
    public function getClient(int $id, SerializerInterface $serializer, ClientRepository $clientRepository): JsonResponse {

        $client = $clientRepository->find($id);
        if ($client) {
            $jsonClient = $serializer->serialize($client, 'json');
            return new JsonResponse($jsonClient, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
   }
   */
   
   #[Route('/api/clients/{id}', name: 'detailClient', methods: ['GET'])]
   public function getDetailClient(Client $book, SerializerInterface $serializer): JsonResponse 
   {
       $jsonClient = $serializer->serialize($book, 'json');
       return new JsonResponse($jsonClient, Response::HTTP_OK, ['accept' => 'json'], true);
   }

   #[Route('/api/clients/{id}', name: 'deleteClient', methods: ['DELETE'])]
    public function deleteClient(Client $book, EntityManagerInterface $em): JsonResponse 
    {
        $em->remove($book);
        $em->flush();
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    #[Route('/api/clients', name:"createClient", methods: ['POST'])]
    public function createClient(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator): JsonResponse 
    {

        $client = $serializer->deserialize($request->getContent(), Client::class, 'json');
        $em->persist($client);
        $em->flush();

        $jsonClient = $serializer->serialize($client, 'json', ['groups' => 'getClients']);
        
        $location = $urlGenerator->generate('detailClient', ['id' => $client->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonClient, Response::HTTP_CREATED, ["Location" => $location], true);
   }


   #[Route('/api/clients/{id}', name:"updateClient", methods:['PUT'])]

    public function updateClient(Request $request, SerializerInterface $serializer, Client $currentClient, EntityManagerInterface $em, ClientRepository $clientRepository): JsonResponse 
    {
        $updatedClient = $serializer->deserialize($request->getContent(), 
                Client::class, 
                'json', 
                [AbstractNormalizer::OBJECT_TO_POPULATE => $currentClient]);
        $em->persist($updatedClient);
        $em->flush();
        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
   }


}
