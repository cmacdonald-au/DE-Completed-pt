<?php

namespace tests\models;

use \Codeception\Test\Unit;

use app\models\Cache;

class CacheTest extends Unit
{
    public function testCacheCreatedWithoutData()
    {
        $key = 'test';
        $cache = new Cache($key, 60);

        $this->assertFalse($cache->get());
        $this->assertFalse($cache->getCreatedAt($key));
    }

    public function testCacheSuccessWithData()
    {
        $key = 'test';
        $cache = new Cache($key, 60);

        $cache->set('Hello World');

        $this->assertEquals($cache->get(), 'Hello World');
        $this->assertInstanceOf('\DateTime', $cache->getCreatedAt($key));
    }

    public function testCacheExpiresSuccessfully()
    {
        $key = 'test';
        $cache = new Cache($key, 3);
        $cache->set('Hello World');
        $this->assertEquals($cache->get(), 'Hello World');

        sleep(4);

        $this->assertEquals($cache->get(), null);
        $this->assertEquals($cache->getCreatedAt($key), false);
    }
}
