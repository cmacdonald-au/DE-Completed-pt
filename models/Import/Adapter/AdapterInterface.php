<?php

namespace app\models\Import\Adapter;

interface AdapterInterface
{
    /**
     * Fetch required data
     *
     * @return void
     */
    public function fetch();
}
