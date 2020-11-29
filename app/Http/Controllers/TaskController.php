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
        $id = Auth::user()->id;
        Task::create([
            'title' => $this->request->input(['title']),
            'description' => $this->request->input(['description']),
            'createdBy' => $id,
            'category_id' => $this->request->input(['taskOption']),
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

    public function createCategory()
    {
        DB::table('categories')->insertOrIgnore([
            ['id' => 1, 'name' => 'Matematyka'],
            ['id' => 2, 'name' => 'Biologia'],
            ['id' => 3, 'name' => 'Fizyka'],
            ['id' => 4, 'name' => 'Chemia']]);
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
        $this->createCategory(); // UŻYJ TEGO, ABY UZUPEŁNIĆ LISTĘ KAREGORII DO WYŚWIETLENIA
        $select = Task::select('id','title','created_at','updated_at','category_id')
        ->simplePaginate(5);


        $select = DB::table('task')
            ->join('categories', 'task.category_id', '=', 'categories.id')
            ->select(
                'task.id', 'task.title', 'task.description', 'task.created_at', 'task.updated_at',
                'categories.id as category_id', 'categories.name as categories_name'
            )
            ->simplePaginate(10);


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
