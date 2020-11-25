<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;
use mysql_xdevapi\Table;
use Auth;

class UserController extends Controller
{

    public function showProfile()
    {
        $edit = False;
        return view('profile', ['edit' => $edit]);
    }
    public function editProfile()
    {
        $edit = True;
        return view('profile', ['edit' => $edit]);
    }

    public function updateData(Request $request)
    {
        $data = '';
        $name = $request->input(['name']);
        $email= $request->input(['email']);
        $request->validate(
            [
                'email' => 'required | email | min:5 | unique:users'

            ]);
        $id = Auth::user()->id;
        $column = array_keys($request->input())[1];
        if ($column == 'name')
        {
            $data = $name;
        }
        else
        {
            $data = $email;
        }
        $this->update($column, $data, $id);
        return redirect('/user');

    }

    public function update($column, $data, $id)
    {
        DB::update('update users set '.$column.'=? where id = ?',[$data,$id]);
    }

}
