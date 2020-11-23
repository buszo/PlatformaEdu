<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;

class TaskController extends Controller
{
    public array $userData = [];
    public Request $request;

    public function createTask()
    {
        //$this->clearTasks();
        DB::table('task')->insert(
            [
                'title' => $this->request->input(['title']),
                'description' => $this->request->input(['title']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }

    public function showActiveTasks()
    {
        $title = DB::table('task')->select('SELECT title from task');
        dump($title);
    }

    public function clearTasks()
    {
        DB::table('task')->truncate();
    }


    public function new(Request $req)
    {
        $this->request = $req;
        $req->validate([
            'address' => 'required | min:5',
            'title' => 'required | min:5',
            'description' => 'required | min:5'
        ]);
        $this->createTask();
        $this->showActiveTasks();
        return view('task', ['adres' => $req->input('address')]);
    }
}
