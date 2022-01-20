<?php

namespace InterviewExercise\Pet\Controllers;

use InterviewExercise\Pet\Repositories\PetRepository;
use InterviewExercise\Pet\Repositories\RepositoryInterface as PetRepositoryInterface;
use Psr\Http\Message\ResponseInterface;

class PetController
{
    private PetRepositoryInterface $_petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->_petRepository = $petRepository;
    }

    public function getById(string $petId, ResponseInterface $response): ResponseInterface
    {
        $pet = $this->_petRepository->getByID((int)$petId);

        if (!$pet) {
            return $response->withStatus(404);
        }

        $body = json_encode($pet->getIterator());
        if (!$body) {
            return $response->withStatus(500);
        }

        $response->getBody()->write($body);

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function getByName(string $name, ResponseInterface $response): ResponseInterface
    {
        $pet = $this->_petRepository->getByName($name);

        if (!$pet) {
            return $response->withStatus(404);
        }

        $body = json_encode($pet->getIterator());
        if (!$body) {
            return $response->withStatus(500);
        }

        $response->getBody()->write($body);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
