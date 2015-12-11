<?php

namespace App\Repositories\Client;

use App\Repositories\Client\Contracts\Store;
use File;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Csv\Reader;
use League\Csv\Writer;
use SplFileObject;

class CsvStore implements Store
{
    /**
     * Get paginated client list.
     *
     * @param $perPage
     * @param $request
     *
     * @return mixed
     */
    public function paginated($perPage, $request)
    {
        $this->checkCsvFile();
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $perPage;
        $clients = Reader::createFromPath(storage_path('app/client.csv'));
        $total = $clients->each(function () {
            return true;
        });

        return (new LengthAwarePaginator($clients->setOffset($offset)->setLimit($perPage)->fetchAll(), $total, $perPage))->setPath('client');
    }

    /**
     * Store Requested data.
     *
     * @param $request
     *
     * @return static
     */
    public function store($request)
    {
        $file = $this->checkCsvFile();
        $writer = Writer::createFromPath(new SplFileObject($file), 'a');

        return $writer->insertOne($request->except('_token'));
    }

    /**
     * Checking if csv file exist if not create it.
     *
     * @return string
     */
    public function checkCsvFile()
    {
        $file = storage_path('app/client.csv');
        if ( !File::exists($file)) {
            File::put($file, '');

            return $file;
        }

        return $file;
    }
}
