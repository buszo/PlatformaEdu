<?php
namespace App\Http\Controllers;
session_start();
use App\Http\Controllers\Controller;
use App\Models\Avatar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Schema;
use mysql_xdevapi\Table;
use Auth;
use Image;
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
    public function changeAvatar()
    {
        $edit = 3;
        return view('profile', ['edit' => $edit]);
    }

    public function changePassword()
    {
        $edit = 2;
        return view('profile', ['edit' => $edit]);
    }

    public function updateData(Request $request)
    {
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
        $_SESSION['success'] = 'Dane zostały zmienione!';
        return redirect('/user');

    }
    public function updatePassword(Request $request)
    {
        $id = Auth::user()->id;
        $current_password = $request->input(['current_password']);
        $new_password = $request->input(['new_password']);
        $confirm_new_password = $request->input(['confirm_new_password']);
        $hashed_password = Auth::user()->password;

        if (Hash::check($current_password,$hashed_password))
        {
            if ($new_password == $confirm_new_password)
            {
                $_SESSION['success'] = 'Dane zostały zmienione!';
                $new_password = Hash::make($new_password);
                DB::update('update users set password=? where id = ?',[$new_password,$id]);
                return redirect('/user');
            }
            else
            {
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


    public function upload(Request $request)
    {
        $var = Avatar::all();
        $id = Auth::user()->id;
        if ($request->hasFile('image'))
        {


            $image = $request->file('image');
            $input['imagename'] = $hashName = $request->image->hashName();
            $destinationPath = public_path('/images');
            $img = Image::make($image->path());
            $img->resize(160, 160, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);


            $image->move($destinationPath, $input['imagename']);

            while(DB::table('avatars')->where('user_id', $id)->exists())
            {
                unlink($destinationPath.'/'.DB::table('avatars')->where('user_id', Auth::user()->id)->value('hashName'));
                DB::table('avatars')->where('user_id', $id)->delete();
            }

            Avatar::create([
                'hashName' => $input['imagename'],
                'user_id' => $id
            ]);
            $_SESSION['success'] = 'Zmieniono awatar!';
            return redirect('/user');

        }
        else{
            $_SESSION['error'] = 'Nie dodano zdjęcia!';
            ?>
            <script>
                history.back();
            </script>
            <?php
        }
    }

}
