<?php

namespace app\models;

use \DateTime;
use Yii;

class Cache
{
    const CREATED_AT_KEY_SUFFIX = '-time';

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
        Yii::$app->cache->set($this->key . self::CREATED_AT_KEY_SUFFIX, new DateTime(), $this->seconds);
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

    /**
     * Gets the datetime of when this cache was created
     *
     * @return mixed
     */
    public function getCreatedAt($key)
    {
        return Yii::$app->cache->get($key . self::CREATED_AT_KEY_SUFFIX);
    }
}
