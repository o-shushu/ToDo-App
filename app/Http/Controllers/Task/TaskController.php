<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all()->where('user_id', auth()->user()->id);

        $current_folder = Folder::find($id);

        if(isset($current_folder)){

            $tasks = $current_folder->tasks()->get();
    
            return view('tasks/index', [
                'folders' => $folders,
                'current_folder_id' => $id,
                'tasks' => $tasks,
            ]);
        }

        return view('errors/pages_not_exist');
    }

    public function showCreateForm(int $id)
    {
        $current_folder = Folder::find($id);

        if(isset($current_folder)){
            return view('tasks/create', [
                'folder_id' => $id
            ]);
        }

        return view('errors/pages_not_exist');
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        //リレーションを活かしたデータの保存方法
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);

    }

    public function showEditForm(int $id, int $taskId)
    {
        $current_folder = Folder::find($id);
        $task = Task::find($taskId);

        if(isset($current_folder) && isset($task)){

            return view('tasks/edit', [
                'task' => $task,
            ]);
        }

        return view('errors/pages_not_exist');
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
