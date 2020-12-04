<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adminLTE.dashboard');
    }


    // TODO: generator dokumentów ma czytać CSS
    public function generatePdf()
    {
        $html = $_GET['html'];
        $pdf = new Dompdf();

        $pdf->loadHTML($html);
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

    public function convertTaskToHtml()
    {
        $select = '';
        return response()->json($select);
    }


    public function sheetEditor()
    {
        return view('editor');
    }


    public function logout()
    {

        Auth::logout();
        return redirect('/login');
    }
}
