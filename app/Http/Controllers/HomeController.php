<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Sheet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userID()
    {
        $id = Auth::user()->id;
        return $id;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/user');
    }


    public function generatePdf()
    {
        $html = $_POST['html'];
        $pdf = new Dompdf();

        $pdf->loadHTML($html, 'UTF-8');
        $pdf->render();
        $output = $pdf->output();
        file_put_contents('file', $output);

        $data = base64_encode($output);

        return response()->json($data);
    }

    public function getTasks()
    {
        $category = $_GET['category'];
        $query = DB::table('task')->join('categories', 'task.category_id', '=', 'categories.id')->where('categories.name', '=', $category)->get();

        return response()->json($query);
    }


    public function sheetEditor(int $id = -1)
    {
        $query = DB::table('categories')->select('categories.name as name')->get();
        $query1 = DB::table('sheets')->select('sheets.id as id', 'sheets.title as title', 'sheets.updated_at as updated_at', 'sheets.desc as desc')->orderBy('updated_at', 'desc')->get();
       
        if(count($query1) > 3) $query1 = $query1->take(3); 

        $sheet = DB::table('sheets')->select('sheets.id as id', 'sheets.content as content', 'sheets.title as title', 'sheets.desc as desc')->where('sheets.id', '=', $id)->get();
        return view('editor', ['categories' => $query, 'sheets' => $query1, 'sheet' => $sheet]);

    }

    public function sheetList(Request $request) 
    {
        $mail = $request->input('mail');
        $title = $request->input('title');
        $since = $request->input('since');
        $until = $request->input('until');
        $desc = $request->input('desc');
        $sheets1 = [];
        $sheets2 = [];
        $sheets3 = [];
        $sheets4 = [];
        $sheets5 = [];
        $sheets_all = [];
        $array = [];
        $sheets = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->simplePaginate(8);
        $all = $sheets->count();
        $user = DB::table('users')->where('users.email','=', $mail)->first();


        if ($user != '') {
            $sheets1 = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->where('sheets.user_id', '=', $user->id)->paginate(8);
            if (count($sheets1)>0) array_push($sheets_all, (array)$sheets1);
        }
        if($title != '') {
            $sheets2 = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->where('sheets.title', '=', $title)->paginate(8);
            if (count($sheets2)>0) array_push($sheets_all, (array)$sheets2);
        }
        if($since != '') {
            $sheets3 = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->where('sheets.updated_at', '>', $since)->paginate(8);
            if (count($sheets3)>0) array_push($sheets_all, (array)$sheets3);
        }
        if($until != '') {
            $sheets4 = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->where('sheets.updated_at', '<', $until)->paginate(8);
            if (count($sheets4)>0) array_push($sheets_all, (array)$sheets4);
        }
        if($desc != '') {
            $sheets5 = DB::table('sheets')->select('sheets.id as id', 'sheets.title', 'sheets.desc as desc', 'sheets.user_id as user_id')->where('sheets.desc', '=', $desc)->paginate(8);
            if (count($sheets5)>0) array_push($sheets_all, (array)$sheets5);
        }

        $intersection = []; 

        if(count($sheets_all) >0) {
        }
        
        return view('sheetList', ['sheets' => $sheets]);
    }

    public function showSheet(int $id)
    {
        $query = DB::table('sheets')->where('sheets.id', '=', $id)->get();

        return view('showSheet', ['sheet' => $query]);
    }

    public function save() {
        $html = $_POST['html'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $id = $_POST['id'];

        if($id === '')
        {
            $sheet = new Sheet();

            $sheet->title = $title;
            $sheet->content = $html;
            $sheet->desc = $desc;
            $sheet->created_at = Carbon::now();
            $sheet->updated_at = Carbon::now();
            $sheet->user_id = $this->userID();
            $sheet->save();
        }
        else 
        {
            $find = Sheet::find(intval($id));
            $find->title = $title;
            $find->content = $html;
            $find->desc = $desc;
            $find->save();
        }

        return response()->json(true);
    }

    public function deleteSheet(int $id)
    {
        Sheet::where('id', $id)->delete();
        return back();
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
