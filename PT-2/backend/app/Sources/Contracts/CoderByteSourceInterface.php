<?php

namespace App\Sources\Contracts;

interface CoderByteSourceInterface
{
    /**
     * Fetch list of age counting.
     * 
     * @return mixed
     */
    public function fetchAgeCounting();
}
