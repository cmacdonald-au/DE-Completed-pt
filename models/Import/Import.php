<?php

namespace app\models\Import;

use \Exception;
use \ErrorException;
use app\models\Import\Adapter\AdapterInterface;

class Import
{
    private $adapter;

    /**
     * The constructor
     *
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Fetch data
     *
     * @return mixed
     */
    public function fetch()
    {
        try {
            $data = $this->adapter->fetch();
        } catch (Exception $e) {
            throw $e;
        };

        return $data;
    }
}
