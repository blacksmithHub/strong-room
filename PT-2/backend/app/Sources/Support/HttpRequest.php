<?php

namespace App\Sources\Support;

use GuzzleHttp\Client;

use App\Sources\Support\BaseContracts\HttpRequestInterface;

class HttpRequest implements HttpRequestInterface
{
    /**
     * HTTP Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Create the class instance and inject its dependency.
     *
     * @param GuzzleHttp\Client $http
     */
    public function __construct()
    {
        $this->http = new Client();
    }

    /**
     * HTTP GET request
     *
     * @param string $route
     * @param array|null $query
     * @param array $headers
     * @param bool $async
     * @return array
     */
    public function get(string $route, ?array $query, array $headers = [], bool $async = false)
    {
        if ($async) {
            return $this->http->requestAsync(
                'GET',
                $route,
                [
                    'http_errors' => false,
                    'query' => $query,
                    'headers' => $headers
                ]
            );
        }

        $response = $this->http->request(
            'GET',
            $route,
            [
                'http_errors' => false,
                'query' => $query,
                'headers' => $headers
            ]
        );

        switch ($response->getStatusCode()) {
            case 200:
                $response = json_decode($response->getBody());

                return $response;

            default:
                abort($response->getStatusCode(), $response->getBody());
        }
    }
}
