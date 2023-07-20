<?php

namespace App\Sources;

use Illuminate\Support\Arr;

use App\Sources\Source;
use App\Sources\Contracts\CoderByteSourceInterface;
use App\Sources\Support\BaseContracts\HttpRequestInterface;

class CoderByteSource extends Source implements CoderByteSourceInterface
{
    /**
     * Create the source instance and declare the route endpoint.
     * 
     * @param App\Sources\Support\BaseContracts\HttpRequestInterface $http
     */
    public function __construct(HttpRequestInterface $http)
    {
        $this->route = 'https://coderbyte.com';
        $this->http = $http;
    }

    /**
     * Fetch list of age counting.
     * 
     * @return mixed
     */
    public function fetchAgeCounting()
    {
        $route = sprintf('%s/api/challenges/json/age-counting', $this->route);

        Arr::set($headers, 'Accept', 'application/json');

        return $this->http->get($route, [], $headers);
    }
}
