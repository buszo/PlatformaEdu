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
        return view('task');
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
        $userId = Auth::user()->id;
        Task::find($id);
        $select = Task::find($id);
        if (DB::table('task')->where('createdBy', '=', $userId)->find($id)) {
            return view('taskdetails', [
                'query' => $select
            ]);
        }
    }




    public function listByCategory(string $category)
    {
        $id = Auth::user()->id;
        $select = DB::table('task')
            ->join('categories', 'task.category_id', '=', 'categories.id')
            ->select(
                'task.id', 'task.title', 'task.description', 'task.created_at', 'task.updated_at',
                'categories.id as category_id', 'categories.name as categories_name'
            )
            ->where('categories.name', '=', $category)->where('createdBy', '=', $id)
            ->simplePaginate(10);

        $categories_raw = DB::table('categories')->get()->toArray();
        $categories = array_column($categories_raw, 'name', 'id');
        if (in_array($category, $categories)) {
            return view('listcategory', ['category' => $category, 'select' => $select]);
        }else
            return redirect()->back();

    }

    public function list()
    {
        $id = Auth::user()->id;
        $this->createCategory();

        $select = DB::table('task')
            ->join('categories', 'task.category_id', '=', 'categories.id')
            ->select(
                'task.id', 'task.title', 'task.description', 'task.created_at', 'task.updated_at',
                'categories.id as category_id', 'categories.name as categories_name'
            )
            ->where('createdBy', '=', $id)
            ->simplePaginate(10);

        return view('layouts.tasklist', ['select' => $select]);
    }

    public function new(Request $req)
    {
        @session_start();
        $this->request = $req;
        if (!empty($req->input(['title']) && !empty($req->input(['description'])))) {
            $this->createQuery();
            $_SESSION['title'] = $req['title'];
        }
        return redirect()->back();
    }


}


