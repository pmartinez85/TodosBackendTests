<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Class Task
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    protected $client;
    protected $todosbackendUrl="http://localhost:8080/api/v1/task";

    /**
     * TaskController constructor.
     * @param $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return $this
     */
    public function index()
    {

        dd(\GuzzleHttp\json_decode($this->client->request('GET',$this->todosbackendUrl)->getBody())->data);
        $tasks = collect(\GuzzleHttp\json_decode($this->client->request('GET', $this->todosbackendUrl)->getBody())->data);
        return view('tasks')->with('tasks', $tasks);

    }
}
