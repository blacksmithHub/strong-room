<?php

namespace App\Pipelines;

use Illuminate\Pipeline\Pipeline;

use App\Pipelines\Support\SearchPipeline\{
    FilterPipe,
    SortPipe,
    RelationPipe,
};

trait SearchPipeline
{
    /**
     * Available pipelines
     * 
     * @var array $pipes
     */
    protected $pipes = [
        FilterPipe::class,
        SortPipe::class,
        RelationPipe::class,
    ];

    /**
     * Search for specific resources in the database.
     *
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function search(array $request)
    {
        request()->merge(['search' => $request]);

        $data = app(Pipeline::class)
            ->send($this->model)
            ->through($this->pipes)
            ->thenReturn();

        return $data;
    }
}
