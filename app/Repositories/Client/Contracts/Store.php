<?php

namespace App\Repositories\Client\Contracts;

interface Store
{
    /**
     * Get paginated client list.
     *
     * @param $perPage
     * @param $request
     *
     * @return mixed
     */
    public function paginated($perPage, $request);

    /**
     * Store Requested data.
     *
     * @param $request
     *
     * @return mixed
     */
    public function store($request);
}
