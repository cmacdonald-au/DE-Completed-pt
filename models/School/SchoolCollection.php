<?php

namespace app\models\School;

use app\models\School\School;

class SchoolCollection
{
    private $schools;

    /**
     * Add a school to the collection
     *
     * @param School $school
     */
    public function add(School $school)
    {
        $this->schools[] = $school;
    }

    /**
     * Get all the schools
     *
     * @return array
     */
    public function getAll()
    {
        return $this->schools;
    }

    /**
     * Get all school ids in an array
     *
     * @return array
     */
    public function getAllIds()
    {
        return array_map(function ($school) {
            return $school->getId();
        }, $this->school);
    }
}
