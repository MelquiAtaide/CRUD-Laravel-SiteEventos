<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login (){

        return view('user.login');
    }

    public function register () {
        return view('user.register');
    }

    public function auth (Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'E-mail é obrigatório!!',
            'password.required' => 'Senha é obrigatória!!'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('index');
        }else{
            return redirect()->route('login');
        }
    }

    public function user(StoreUserRequest $request, User $user){

        // $user = new User;
        // $user::create($request->all());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/');
    }

    public function logout (){
        Auth::logout();
        return redirect()->route('index');
    }
}
