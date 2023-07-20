<?php

namespace App\Http\Controllers;

use App\Services\Contracts\CoderByteServiceInterface;

class CoderByteController extends Controller
{
    /**
     * @var \App\Services\Contracts\CoderByteServiceInterface
     */
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\Contracts\CoderByteServiceInterface $service
     * @return void
     */
    public function __construct(CoderByteServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Get total count that have an age equal to or greater than 50.
     * 
     * @return \Illuminate\Http\Response
     */
    public function ageCounting()
    {
        return $this->service->ageCounting();
    }
}
