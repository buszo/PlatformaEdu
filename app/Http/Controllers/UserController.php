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
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function showProfile()
    {
        $edit = 0;
        return view('profile', ['edit' => $edit]);
    }
    public function editProfile()
    {
        $edit = 1;
        return view('profile', ['edit' => $edit]);
    }


    public function changePassword()
    {
        $edit = 2;
        return view('profile', ['edit' => $edit]);
    }

    public function updateData(Request $request)
    {
        $data = '';
        $name = $request->input(['name']);
        $email= $request->input(['email']);
        $request->validate(
            [
                'email' => 'email | min:5 | unique:users'

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
    public function updatePassword(Request $request)
    {
        session_start();
        $current_password = $request->input(['current_password']);
        $new_password = $request->input(['new_password']);
        $confirm_new_password = $request->input(['confirm_new_password']);
        $hashed_password = Auth::user()->password;

        if (Hash::check($current_password,$hashed_password))
        {
            if ($new_password == $confirm_new_password)
            {
                $error = 0;
               dd('zmien haslo - tutaj update do bazy');
            }
            else
            {
                $error = 1;
                $_SESSION['error'] = 'Podane hasła są różne!';
                ?>
                <script>
                    history.back();
                </script>
                <?php
            }
        }

        else
        {
            $error = 1;
            $_SESSION['error'] = 'Podane hasło jest nieprawidłowe!';
            ?>
            <script>
                history.back();
            </script>
            <?php
        }







    }

    public function update($column, $data, $id)
    {
        DB::update('update users set '.$column.'=? where id = ?',[$data,$id]);
    }

}
