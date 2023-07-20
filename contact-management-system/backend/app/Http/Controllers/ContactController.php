<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ContactServiceInterface;
use App\Http\Requests\Contact\SearchRequest;

class ContactController extends Controller
{
    /**
     * The service instance.
     *
     * @var \App\Services\Contracts\ContactServiceInterface
     */
    protected $service;

    /**
     * Create the controller instance and resolve its service.
     * 
     * @param \App\Services\Contracts\ContactServiceInterface $service
     */
    public function __construct(ContactServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Search for specific resources in the database.
     *
     * @param  \App\Http\Requests\Contact\SearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        return $this->service->search($request->validated());
    }
}
