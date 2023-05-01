<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();
        // $folders = Auth::user()->folders()->get();
        $current_folder = Folder::find($id);

        //$tasks = Task::where('folder_id', $current_folder->id)->get();

        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_dae = $request->due_date;

        //リレーションを活かしたデータの保存方法
        $current_folder->tasks()->save($task);

        return redirect()->route('task.index',[
            'id' => $current_folder->id,
        ]);
    }

    public function showEditForm(int $id, int $taskId)
    {
        $task = Task::find($taskId);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }

        public function edit(int $id, int $taskId, EditTask $request)
    {
        $task = Task::find($taskId);

        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }
}
