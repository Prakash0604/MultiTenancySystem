<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantAuthController extends Controller
{
    public function index(){
        if(session()->has('email')){
            return redirect()->route('students.index');
        }else{
            return view('Tenant.Login');
        }
    }

    public function storeindex(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:7|string'
        ]);
       $email= $request->email;
       $password=$request->password;
       $teant=Tenant::where('email',$email)->get();
       if($teant->count() >0){
        $check=Hash::check($password,$teant[0]['password']);
        if($check){
            session(['email'=>$request->email]);
            return redirect()->route('students.index');
        }else{
            return back()->with(['message'=>'Invalid Login Crediantials']);
        }
       }else{
        return back()->with(['message'=>'Email does not exist']);
       }

    }

    public function logout(){
        // Auth::logout();
        session()->forget('email');
        return redirect('/login');
    }
}
