<?php

namespace app\models;

use Yii;

class Cache
{
    private $key;
    private $data;
    private $seconds;

    /**
     * The constructor
     *
     * @param string $key
     * @param integer $seconds
     */
    public function __construct($key, $seconds)
    {
        $this->key = $key;
        $this->seconds = $seconds;
    }

    /**
     * Set the data in cache
     *
     * @param mixed $data
     */
    public function set($data)
    {
        Yii::$app->cache->set($this->key, $data, $this->seconds);
    }

    /**
     * Get data from cache
     *
     * @return mixed
     */
    public function get()
    {
        return Yii::$app->cache->get($this->key);
    }
}
