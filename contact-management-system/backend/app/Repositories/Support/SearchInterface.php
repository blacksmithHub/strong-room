<?php

namespace App\Repositories\Support;

interface SearchInterface
{
    /**
     * Search for specific resources in the database.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function search(array $request);
}
