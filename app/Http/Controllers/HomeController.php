<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use App\Models\Task;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        // Filtro das Tasks
        $filteredDate = date('Y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();

        // Datas e Valores
        $carbonDate = Carbon::createFromDate($filteredDate);

        $data['dateString'] = $carbonDate->translatedFormat('d \d\e M');
        $data['date'] = $carbonDate->translatedFormat('Y-m-d');

        return view('home', $data);
    }

    public function alterDate(Request $r)
    {
        $carbonDate = Carbon::createFromDate($r->date);
       
        if ($r->action == 'next') {

            $carbonDate->addDay(1);

        } else {

            $carbonDate->addDay(-1);
        }

        $data['dateString'] = $carbonDate->translatedFormat('d \d\e M');

        $data['date'] = $carbonDate->translatedFormat('Y-m-d');
        
        $data['tasks'] = Task::whereDate('due_date', $data['date'])->get();

        return $data;
    }
}
