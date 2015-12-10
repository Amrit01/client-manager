<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Repositories\Client\Contracts\Store;
use File;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var Store
     */
    private $clientRepository;

    /**
     * @param Store $clientRepository
     */
    public function __construct(Store $clientRepository)
    {

        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of client.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = $this->clientRepository->paginated(10, $request);

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
        try {
            $this->clientRepository->store($request);

            return redirect()->action('ClientController@index');
        } catch (\Exception $e) {

        }

    }
}
