<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Repositories\Client\Contracts\Store;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ClientController extends Controller
{
    /**
     * @var Store
     */
    private $clientRepository;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param Store $clientRepository
     * @param LoggerInterface $logger
     */
    public function __construct(Store $clientRepository, LoggerInterface $logger)
    {
        $this->clientRepository = $clientRepository;
        $this->logger = $logger;
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
        $this->logger->info('Loading Clients List from store');
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
            session()->flash('success', 'Client information saved successfully.');
            $this->logger->info('Requested client information saved to store.', $request->except('_token'));
        } catch (\Exception $e) {
            $this->handleFlashMessage($e);
            $this->logger->error('An exception caught while storing requested client information to store.', ['request' => $request->except('_token'), 'exception' => $e]);
        }

        return redirect()->action('ClientController@index');
    }
}
