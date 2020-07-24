<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;

class ClientController extends Controller

{
    public function index()
    {
        return view('layout/home');
    }
/*account*/
    public function getlogin()
    {
        return view('Client/login');
    }
    public function postlogin(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('dashboard');
        }
        else{
            return redirect('/')->with('status','Email hoặc mật khẩu không đúng!');
        }
    }
    public  function  getregister(){
        return view('Client/register');
    }
    public function postregister(Request $request){
        $validatedData = $request->validate([
            'email' => 'unique:users',
        ]);

        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password);
        //$user->role=2;
        //$user->trangthai=1;
        $user->save();
        return redirect('/');
    }
    public function getlogout(Request $request){
        $request->session()->forget('postlogin');
        return session()->redirect('/');
    }
/* end account*/

    public function dashboard(){
        return view('Client/home');
    }


}
