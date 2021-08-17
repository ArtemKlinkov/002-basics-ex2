<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Faker\Factory;


class TaskController extends Controller
{
    public function allTasks()
    {
        $tasks = Task::all();
        return view('task_list', ['tasks' => $tasks]);
    }

    public function findByID(int $id)
    {
        $task = Task::where('id', $id)->first();
        if (!is_null($task)) {
            return view('task_list', ['tasks' => [$task]]);
        }
        return abort(404);
    }

    public function createTask()
    {
        $faker = $faker = Factory::create();
        $task = Task::create([
            'title' => $faker->text(100),
            'description' => $faker->text(200),
        ]);
        return redirect()->route('todo');
    }
}
