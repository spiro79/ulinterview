<?php

namespace InterviewExercise\Pet\DTOs;

use ArrayIterator;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<string, mixed>
 */
class PetDTO implements IteratorAggregate
{
    private int $_petId;
    private string $_name;
    private string $_species;
    private string $_gender;

    public function __construct(int $petId, string $name, string $species, string $gender)
    {
        $this->_petId = $petId;
        $this->_name = $name;
        $this->_species = $species;
        $this->_gender = $gender;
    }

    /**
     * Used to produce a proper object when producing a JSON string
     *
     * @return ArrayIterator<string, mixed>
     */
    public function getIterator(): ArrayIterator
    {
        $iArray = [];
        $iArray['id'] = $this->_petId;
        $iArray['name'] = $this->_name;
        $iArray['species'] = $this->_species;
        $iArray['gender'] = $this->_gender;

        return new ArrayIterator($iArray);
    }
}
