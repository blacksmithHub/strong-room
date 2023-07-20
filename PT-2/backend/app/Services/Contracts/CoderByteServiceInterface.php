<?php

namespace App\Services\Contracts;

interface CoderByteServiceInterface
{
    /**
     * Get total count that have an age equal to or greater than 50.
     * 
     * @return \Illuminate\Http\Response
     */
    public function ageCounting();
}
