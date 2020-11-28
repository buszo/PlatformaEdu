<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Schema;
use mysql_xdevapi\Table;

class TaskController extends Controller
{
    public Request $request;

    public function index(Request $req)
    {
        $var = Task::all();
        $select = Task::latest('created_at')->first();
        return view('task', ['select' => $select]);
    }

    public function createQuery()
    {
        //$this->clearTasks();
        Task::create([
            'title' => $this->request->input(['title']),
            'description' => $this->request->input(['description']),
            'createdBy' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function clearTasks()
    {
        DB::table('task')->truncate();
    }

    public function deleteTask(int $id, Request $request)
    {
        session_start();
        $var = $_SESSION['id'] = $id;
        Task::where('id', $id)->delete();
        return back();
    }

    public function updateTask(int $id)
    {

    }

    public function taskDetails(int $id)
    {
        Task::find($id);
        $select = Task::find($id);
        return view('taskdetails', [
            'query' => $select
        ]);
    }

    public function list()
    {
        $select = Task::select('id','title','created_at','updated_at')
        ->simplePaginate(5);
        return view('layouts.tasklist', ['select' => $select]);
    }

    public function new(Request $req)
    {
        $this->request = $req;
        if (!empty($req->input(['title']) && !empty($req->input(['description'])))) {
            $this->createQuery();
        }
        return redirect()->back();
    }


}
