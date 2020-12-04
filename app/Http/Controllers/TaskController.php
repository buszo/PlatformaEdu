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

    public function userID()
    {
        $id = Auth::user()->id;
        return $id;
    }


    public function index(Request $req)
    {
        return view('task', ['id' => $this->userID()]);
    }

    public function newCategory(Request $req)
    {
        if (!empty($req->input(['categoryName']))) {
            DB::table('categories')->insert(
                [
                    'name' => $req->input(['categoryName']),
                    'userId' => $this->userID()
                ]
            );
        }
        return redirect()->back();
    }

    public function createQuery()
    {
        //$this->clearTasks();
//        $id = Auth::user()->id;
        Task::create([
            'title' => $this->request->input(['title']),
            'description' => $this->request->input(['description']),
            'createdBy' => $this->userID(),
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
            ['name' => 'Matematyka'],
            ['name' => 'Biologia'],
            ['name' => 'Fizyka'],
            ['name' => 'Chemia']]);
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
        $select = DB::table('task')
            ->join('categories', 'task.category_id', '=', 'categories.id')
            ->select(
                'task.id', 'task.title', 'task.description', 'task.created_at', 'task.updated_at',
                'categories.id as category_id', 'categories.name as categories_name'
            )
            ->where('categories.name', '=', $category)->where('createdBy', '=', $this->userID())
            ->simplePaginate(10);

        $categories_raw = DB::table('categories')->get()->toArray();
        $categories = array_column($categories_raw, 'name', 'id');
        if (in_array($category, $categories)) {
            return view('listcategory', ['category' => $category, 'select' => $select]);
        } else
            return redirect()->back();

    }

    public function list()
    {
//        $this->createCategory();

        $select = DB::table('task')
            ->join('categories', 'task.category_id', '=', 'categories.id')
            ->select(
                'task.id', 'task.title', 'task.description', 'task.created_at', 'task.updated_at',
                'categories.id as category_id', 'categories.name as categories_name'
            )
            ->where('createdBy', '=', $this->userID())
            ->simplePaginate(10);
        $all = $select->count();
        $categoryCount = DB::table('categories')->count('id');
        return view('layouts.tasklist', ['select' => $select, 'all' => $all, 'categoryCount' => $categoryCount]);
    }

    public function new(Request $req)
    {
        @session_start();
        $this->request = $req;
        if (!empty($req->input(['title']) && !empty($req->input(['description']))) &&
            !empty($req->input(['taskOption']))) {
            $this->createQuery();
            $_SESSION['title'] = $req['title'];
        }
        return redirect()->back();
    }


}


