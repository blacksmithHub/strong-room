<?php

namespace App\Sources\Support\BaseContracts;

interface HttpRequestInterface
{
    /**
     * HTTP GET request
     *
     * @param string $route
     * @param array|null $query
     * @param array $headers
     * @param bool $async
     * @return mixed
     */
    public function get(string $route, ?array $query, array $headers = [], bool $async = false);
}
