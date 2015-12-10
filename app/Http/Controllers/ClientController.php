<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use File;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Csv\Reader;
use League\Csv\Writer;
use SplFileObject;

class ClientController extends Controller
{
    /**
     * Display a listing of client.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 2;
        $page = $request->query('page', 1);
        $offset = ($page - 1) * $limit;
        $clients = Reader::createFromPath(storage_path('app/client.csv'));
        $total = $clients->each(function () {
            return true;
        });
        $clients = (new LengthAwarePaginator($clients->setOffset($offset)->setLimit($limit)->fetchAll(), $total, $limit))->setPath('client');

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created client in storage.
     *
     * @param StoreClientRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $file = storage_path('app/client.csv');
        if (!File::exists($file)) {
            File::put($file, '');
        }
        $writer = Writer::createFromPath(new SplFileObject($file), 'a');
        $writer->insertOne($request->except('_token'));

        return redirect()->action('ClientController@index');
    }
}
