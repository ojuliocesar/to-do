<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.main');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function update()
    {
        return view('tasks.update');
    }

    public function delete()
    {
        echo 'oi';
    }
}
