<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{ public function index()
{
    $task = Tasks::orderBy('order')->get();
//        dd($task);
    return view('tasks.index')->with([
        'task' => $task,
    ]);
}
    public function create()
    {
        return view('tasks.create');
    }
    public function storeTask(Request $request)
    {
        $this->validate($request, [
            'label' => 'required',
            'icon' => 'required',
            'color' => 'required',
            'description' => 'required',
            'due_date' => 'required',
        ]);
        Tasks::create($request->all());

        return redirect('api/user/tasks/')->with('success_message', 'Task Created Successfully!');
    }

    public function destroy($taskid)
    {
        $task=Tasks::whereId($taskid)->delete();
        return back()->with('success_message', 'Task Deleted Successfully.');
    }


    public function updateTaskOrder(Request $request)
    {
        $tasks = Tasks::get();
        foreach ($tasks as $task) {
            foreach ($request->order as $order) {
                if ($order['id'] == $task->id) {
                    $task->update(['id' => $order['position']]);
                }
            }
        }

        return response('Task Updated Successfully.');
    }
}
