<?php
/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 12/10/15
 * Time: 12:49 AM
 */

namespace App\Repositories\Client\Contracts;


interface Store
{

    /**
     * Get paginated client list
     *
     * @param $perPage
     *
     * @return mixed
     */
    public function paginated($perPage);

    public function store($data);

}