<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class Task
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    public function index()
    {
        return view('/tasks')->with('tasks', []);

         // return ['tasca1', 'tasca2', 'tasca3'];

    }
}
