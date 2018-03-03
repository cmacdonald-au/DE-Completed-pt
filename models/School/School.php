<?php

namespace app\models\School;

use \DomainException;

class School
{
    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    /** @var array */
    private $headCount = [];

    /**
     * The constructor
     *
     * @param integer $id
     * @param string $name
     * @param array $headCount
     */
    public function __construct($id, $name, array $headCount = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->headCount = $headCount;
    }

    /**
     * Get the id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the head count
     *
     * @return array
     */
    public function getHeadCount()
    {
        return $this->headCount;
    }

    /**
     * Get the head count for the school in a given year
     *
     * @param integer $year
     *
     * @return integer
     */
    public function getHeadCountByYear($year)
    {
        try {
            return $this->headCount[$year];
        } catch (Exception $e) {
            throw new DomainException('No head count data available for year: ' . $year);
        }
    }

    /**
     * Get total head count for this school
     *
     * @return integer
     */
    public function getTotalHeadCount()
    {
        return array_sum($this->headCount);
    }
}
