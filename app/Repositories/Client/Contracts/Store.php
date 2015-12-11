<?php

namespace App\Repositories\Client\Contracts;

interface Store
{
    /**
     * Get paginated client list.
     *
     * @param $perPage Number of result per page
     * @param $request illuminate request object
     *
     * @return mixed
     */
    public function paginated($perPage, $request);

    /**
     * Store Requested data.
     *
     * @param $request illuminate request object
     *
     * @return mixed
     */
    public function store($request);
}
