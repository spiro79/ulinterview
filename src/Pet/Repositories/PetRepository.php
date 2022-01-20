<?php

namespace InterviewExercise\Pet\Repositories;

use InterviewExercise\Pet\DTOs\PetDTO;
use InterviewExercise\Pet\Factories\PetFactory;

class PetRepository implements RepositoryInterface
{
    /**
     * Dummy data to be fetched
     *
     * @var array<mixed>
     */
    protected static array $pets = [
        [
            'id' => 1,
            'name' => 'Plopper',
            'species' => 'Pig',
            'gender' => 'male',
        ],
        [
            'id' => 2,
            'name' => 'Snowball',
            'species' => 'Cat',
            'gender' => 'Female',
        ],
        [
            'id' => 3,
            'name' => 'Pinchy',
            'species' => 'Lobster',
            'gender' => 'Male',
        ],
    ];
    protected PetFactory $petFactory;

    public function __construct(PetFactory $petFactory)
    {
        $this->petFactory = $petFactory;
    }

    private function _searchByIntAttribute(string $attribute, int $value): ?PetDTO
    {
        foreach (self::$pets as $pet) {
            if ($pet[$attribute] === $value) {
                return $this->petFactory->makeFromArray($pet);
            }
        }

        return null;
    }

    private function _searchByStringAttribute(string $attribute, string $value): ?PetDTO
    {
        foreach (self::$pets as $pet) {
            if (strtolower($pet[$attribute]) === strtolower($value)) {
                return $this->petFactory->makeFromArray($pet);
            }
        }

        return null;
    }

    public function getByID(int $petId): ?PetDTO
    {
        return $this->_searchByIntAttribute('id', $petId);
    }

    public function getByName(string $name): ?PetDTO
    {
        return $this->_searchByStringAttribute('name', $name);
    }
}
