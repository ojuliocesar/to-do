<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use App\Models\Task;

class HomeController extends Controller
{
    public function index(Request $r)
    {


        $isValidDate = Carbon::canBeCreatedFromFormat($r->date, 'Y-m-d');

        $filterValues = [
            'allTasks',
            'pendingTasks',
            'finishedTasks'
        ];

        $isValidFilter = array_search($r->filter, $filterValues);

        // Filtro das Tasks
        $filteredDate = $isValidDate ? $r->date : date('Y-m-d');

        $filterStatus = $isValidFilter ? $r->filter : $filterValues[0];

        // $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();

        if ($filterStatus != 'allTasks') {

            $isDone = false;

            switch ($filterStatus) {
                case 'pendingTasks':

                    $isDone = false;
                    break;
                
                case 'finishedTasks':

                    $isDone = true;
                    break;
            }

            $data['tasks'] = Task::where('is_done', $isDone)
                ->whereDate('due_date', $filteredDate)->get();

        } else {

            $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();
        }

        // Datas e Valores
        $carbonDate = Carbon::createFromDate($filteredDate);

        $data['dateString'] = $carbonDate->translatedFormat('d \d\e M');
        $data['date'] = $carbonDate->translatedFormat('Y-m-d');

        $data['filter'] = $filterStatus;

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

        if ($r->filter != 'allTasks') {

            $isDone = false;

            switch ($r->filter) {
                case 'pendingTasks':

                    $isDone = false;
                    break;
                
                case 'finishedTasks':

                    $isDone = true;
                    break;
            }

            $data['tasks'] = Task::where('is_done', $isDone)
                ->whereDate('due_date', $data['date'])->get();
                
            } else {
                
            $data['tasks'] = Task::whereDate('due_date', $data['date'])->get();
        }

        return $data;
    }

    public function alterFilter(Request $r)
    {
       
        if ($r->filter != 'allTasks') {

            $isDone = false;

            switch ($r->filter) {
                case 'pendingTasks':

                    $isDone = false;
                    break;
                
                case 'finishedTasks':

                    $isDone = true;
                    break;
            }

            $data['tasks'] = Task::where('is_done', $isDone)
                ->whereDate('due_date', $r->date)->get();
                
            } else {
                
            $data['tasks'] = Task::whereDate('due_date', $r->date)->get();
        }

        return $data;

    }
}
