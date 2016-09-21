<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use View;

class UserController extends Controller
{
    public function createUser(Request $request) {

        $email = $request->input('email');
        $password = $request->input('password');
        $password = bcrypt($password);

        $userId = DB::table('users')->insertGetId(
            ['email' => $email, 'password' => $password]
        );

        return redirect()->route('userHome', ['id' => $userId]);
    }

    public function login() {
        Auth::loginUsingId(1);

        return redirect()->route('userHome', ['id' => 1]);
    }

    public function userHome($id) {

        $user = DB::table('users')->select('email')->where('id', '=', 1)->get();
        $getPictures = DB::table('pictures')->select('id', 'user_id', 'name', 'description', 'fileName', 'fileExt')->where('user_id', '=', 1)->get();

        return view::make('userHome')->with('user', $user)->with('pictures', $getPictures);
    }
}
