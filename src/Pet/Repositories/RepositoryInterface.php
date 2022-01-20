<?php

namespace InterviewExercise\Pet\Repositories;

use InterviewExercise\Pet\DTOs\PetDTO;

interface RepositoryInterface
{
    public function getByID(int $petId): ?PetDTO;
    public function getByName(string $name): ?PetDTO;
}
