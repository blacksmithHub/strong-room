<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Contracts\ContactRepositoryInterface;

class ContactRepository extends Repository implements ContactRepositoryInterface
{
    /**
     * Create the repository instance.
     *
     * @param \App\Models\Contact
     */
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }
}
