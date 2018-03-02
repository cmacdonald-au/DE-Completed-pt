<?php

namespace app\models\Import\Adapter;

use \ErrorException;
use app\models\Import\Adapter\AdapterInterface;

class RemoteFileAdapter implements AdapterInterface
{
    /** @var string */
    private $url;

    /**
     * The constructor
     *
     * @param string $url
     */
    public function __construct($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new ErrorException('Not a valid URL: ' . $url);
        }

        $this->url = $url;
    }

    /**
     * Fetch required data
     *
     * @return mixed
     */
    public function fetch()
    {
        $data = file_get_contents($this->url);

        if ($data === false) {
            throw new ErrorException('Cannot fetch data from' . $this->url);
        }

        return $data;
    }
}
