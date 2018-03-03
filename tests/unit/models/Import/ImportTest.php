<?php

namespace tests\models\Import;

use \Codeception\Test\Unit;
use \Codeception\Util\Stub;

use app\models\Import\Import;
use app\models\Import\Adapter\AdapterInterface;

class ImportTest extends Unit
{
    public function testFetchSuccess()
    {
        $adapter = Stub::makeEmpty('app\models\Import\Adapter\AdapterInterface', ['fetch' => 'Hello World']);
        $importer = new Import($adapter);
        $this->assertEquals($importer->fetch(), 'Hello World');
    }

    public function testInvalidAdapterInterface()
    {
        $this->setExpectedException(
            '\TypeError',
            'must implement interface app\models\Import\Adapter\AdapterInterface'
        );

        new Import(123);
    }
}
