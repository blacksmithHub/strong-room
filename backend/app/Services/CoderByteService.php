<?php

namespace App\Services;

use App\Services\Contracts\CoderByteServiceInterface;
use App\Sources\Contracts\CoderByteSourceInterface;

class CoderByteService implements CoderByteServiceInterface
{
    /**
     * @var \App\Sources\Contracts\CoderByteSourceInterface
     */
    protected $source;

    /**
     * Create the service instance.
     *
     * @param \App\Sources\Contracts\CoderByteSourceInterface $source
     */
    public function __construct(CoderByteSourceInterface $source)
    {
        $this->source = $source;
    }

    /**
     * Get total count that have an age equal to or greater than 50.
     * 
     * @return \Illuminate\Http\Response
     */
    public function ageCounting()
    {
        $data = $this->source->fetchAgeCounting();

        // decode the response
        $data = optional($data)->data;

        // convert response to array
        $response = explode(',', $data);

        $filteredResponse = collect($response)->filter(function ($value) {
            // remove extra spaces
            $value = trim($value);

            // skip if data key is not age
            if (!str_contains($value, 'age=')) return false;

            // get the age value and convert to integer
            $age = (int) str_replace('age=', '', $value);

            // return only age equal to or greater than 50
            return ($age >= 50) ? true : false;
        });

        // print the output
        $output = count($filteredResponse);

        return response()->json(['count' => max($output, 0)]);
    }
}
