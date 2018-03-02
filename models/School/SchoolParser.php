<?php

namespace app\models\School;

use \UnexpectedValueException;
use app\models\School\SchoolCollection;

class SchoolParser
{
    const HEAD_COUNT_KEY_PREFIX = 'HC_';

    /**
     * Parse JSON data into a school collcetion 
     *
     * @param string $data
     * @return void
     */
    public function parse($data)
    {
        $schoolData = json_decode($data, true);

        if (!$this->isJson($data)) {
            throw new UnexpectedValueException('Invalid JSON data fetched.');
        }
    
        $collection = new SchoolCollection();

        foreach ($schoolData as $data) {
            $yearlyHeadCount = $this->extractYearlyHeadCount($data);

            $school = new School(
                $data['School Code'],
                $data['School Name'],
                $yearlyHeadCount
            );

            $collection->add($school);
        }

        return $collection;
    }

    /**
     * Extract the yearly head count from a school record data
     *
     * @param array $data
     *
     * @return array
     */
    private function extractYearlyHeadCount($data)
    {
        $yearlyHeadCount = [];

        foreach ($data as $key => $value) {
            $prefix = self::HEAD_COUNT_KEY_PREFIX;
            if (strpos($key, $prefix) === 0) {
                $year = substr($key, strlen($prefix));
                $yearlyHeadCount[$year] = $value;
            }
        }

        // Let's order the years chronologically
        ksort($yearlyHeadCount);

        return $yearlyHeadCount;
    }

    /**
     * Check if value is a valid JSON
     *
     * @param string $string
     * @return boolean
     */
    private function isJson($string)
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }    
}
