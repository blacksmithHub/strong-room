<?php

namespace App\Services;

use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Services\Contracts\ContactServiceInterface;

class ContactService extends Service implements ContactServiceInterface
{
    /**
     * Create the service instance and inject its repository.
     *
     * @param App\Repositories\Contracts\ContactRepositoryInterface
     */
    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Search for specific resources in the database.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\LazyCollection|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\Resources\Json\JsonResource|\Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function search(array $request)
    {
        $data = $this->repository->search($request);

        $data->select([
            'contacts.id',
            'contacts.name',
            'contacts.email_address',
            'contacts.phone_number',
            'logins.username'
        ])
            ->leftJoin('logins', 'logins.user_id', '=', 'contacts.login_id')
            ->groupBy([
                'contacts.id',
                'contacts.name',
                'contacts.email_address',
                'contacts.phone_number',
                'logins.username'
            ]);

        return $data->paginate(15);
    }
}
