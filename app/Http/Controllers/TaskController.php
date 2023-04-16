<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.main');
    }

    public function create()
    {
        $data['categories'] = Category::all();

        return view('tasks.create', $data);
    }

    public function createAction(Request $r)
    {
        $taskData = $r->only(['title', 'due_date', 'category_id', 'description']);

        $taskData['user_id'] = 1;

        Task::create($taskData);

        return redirect(route('home'));
    }

    public function update(Request $r)
    {
        $data['task'] = Task::find($r->id);

        if (!$data['task']) {
            return redirect(route('home'));
        }
        
        $data['categories'] = Category::all();

        return view('tasks.update', $data);
    }

    public function updateAction(Request $r)
    {
        $dataTask = $r->only(['title', 'due_date', 'category_id', 'description']);

        $task = Task::find($r->id);

        if (!$task) {
            return redirect(route('home'));
        }
        
        $task->update($dataTask);

        $task->save();

        return redirect(route('task.update', ['id' => $r->id]));
    }

    public function isDone(Request $r)
    {
        $task = Task::find($r->taskId);

        if (!$task) {
            return redirect(route('home'));
        }

        $task->is_done = !$task->is_done;

        $task->save();
    }

    public function delete(Request $r)
    {
        $task = Task::find($r->id);

        if ($task) {
            $task->delete();
        }

        return redirect(route('home'));
    }
}
