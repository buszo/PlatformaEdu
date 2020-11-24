<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;
use mysql_xdevapi\Table;

class TaskController extends Controller
{
    public Request $request;

    public function createTask()
    {
        //$this->clearTasks();
        DB::table('task')->insert(
            [
                'title' => $this->request->input(['title']),
                'description' => $this->request->input(['description']),
                'createdBy' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );
    }

    public function clearTasks()
    {
        DB::table('task')->truncate();
    }

    public function deleteTask(int $id)
    {
        DB::table('task')->delete($id);
        return $this->list($id);
    }

    public function taskDetails(int $id)
    {
        $select = DB::table('task')->find($id);
        return view('taskdetails', [
            'query' => $select
        ]);
    }

    public function list(int $deletedId = null)
    {
        $select = DB::table('task')->select('id', 'title', 'updated_at', 'created_at')->get();
        return view('layouts.tasklist', ['select' => $select, 'deletedId' => $deletedId]);
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
