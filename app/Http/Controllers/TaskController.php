<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;
use mysql_xdevapi\Table;

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
                'description' => $this->request->input(['description']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }

    public function clearTasks()
    {
        DB::table('task')->truncate();
    }

    public function list()
    {
        $select = DB::table('task')->select('id', 'title', 'updated_at', 'created_at')->get();
        return view('layouts.tasklist', ['select' => $select]);
    }

    public function new(Request $req)
    {
        $this->request = $req;
        if (!empty($req->input(['title']) && !empty($req->input(['description'])))) {
            $this->createTask();
        }
        $select = DB::table('task')->latest('created_at')->first();
        return view('task', ['select' => $select]);
    }
}
