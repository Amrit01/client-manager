<?php

namespace App\Repositories\Client;

use App\Repositories\Client\Contracts\Store;
use File;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Csv\Reader;
use League\Csv\Writer;

class CsvStore implements Store
{

    /**
     * Get paginated client list
     *
     * @param $perPage
     *
     * @param $request
     *
     * @return mixed
     */
    public function paginated($perPage, $request)
    {
        $page    = $request->query('page', 1);
        $offset  = ( $page - 1 ) * $perPage;
        $clients = Reader::createFromPath(storage_path('app/client.csv'));
        $total   = $clients->each(function () {
            return true;
        });

        return (new LengthAwarePaginator($clients->setOffset($offset)->setLimit($perPage)->fetchAll(), $total, $perPage))->setPath('client');
    }

    public function store($request)
    {
        $file = storage_path('app/client.csv');
        if ( ! File::exists($file)) {
            File::put($file, '');
        }
        $writer = Writer::createFromPath(new SplFileObject($file), 'a');

        return $writer->insertOne($request->except('_token'));
    }
}