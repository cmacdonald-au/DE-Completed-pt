<?php

namespace tests\models;

use \Codeception\Test\Unit;

use app\models\Cache;

class CacheTest extends Unit
{
    /**
     * @skip todo: figure out why Yii::$app->cache doesn't exist in a test environment
     */
    public function testCacheCreatedWithoutData()
    {
        $key = 'test';
        $cache = new Cache($key, 60);

        $this->assertFalse($cache->get());
        $this->assertFalse($cache->getCreatedAt());
    }

    /**
     * @skip todo: figure out why Yii::$app->cache doesn't exist in a test environment
     */
    public function testCacheSuccessWithData()
    {
        $key = 'test';
        $cache = new Cache($key, 60);

        $cache->set('Hello World');

        $this->assertTrue($cache->get());
        $this->assertEquals($cache->get(), 'Hello World');
        $this->assertTrue($cache->getCreatedAt());
    }

    /**
     * @skip todo: figure out why Yii::$app->cache doesn't exist in a test environment
     */
    public function testCacheExpiresSuccessfully()
    {
        $key = 'test';
        $cache = new Cache($key, 3);
        $cache->set('Hello World');
        $this->assertEquals($cache->get(), 'Hello World');

        sleep(3);

        $this->assertEquals($cache->get(), null);
        $this->assertEquals($cache->getCreatedAt(), null);
    }
}
