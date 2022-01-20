<?php

namespace InterviewExercise\Pet\Factories;

use InterviewExercise\Pet\DTOs\PetDTO;

class PetFactory
{
    /**
     * @param array<string> $values
     * @return PetDTO
     */
    public function makeFromArray(array $values): PetDTO
    {
        return new PetDTO((int)$values['id'], $values['name'], $values['species'], $values['gender']);
    }
}
