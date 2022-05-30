<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;

class loginController extends Controller
{
    //
    public function checkIfLogin(Request $request) {
        
        if ($request->session()->has('user')){
 //         dd(session()->all());exit;
//          echo "Already logged";

            
            $verify = loginModel::where('username', session('user'))->first();
          //  echo"<pre>";        print_r($verify);exit;
            return view("dashboard", compact('verify'));
       }
        
        else{
        return view ('login');
        
    }
    }
    
    public function postLogin(Request $request) {
        
      //  echo $data['username'];exit;
      //dd(session()->all());exit;
        
        $verify = loginModel::where('username', $request->username)->where('password', $request->password)->first();
      //  echo"<pre>";        print_r($verify); exit;
        if (empty($verify)) {
            
            $error="Invalid Credentials";
            return view ('login', compact('error'));
        } else {
            $data = $request->input();
            $request->session()->put('user', $data['username']);
           // $request->session()->put('pwd', $data['password']);

            return view("dashboard", compact('verify'));
        }
        
    }
    public function adminLogout() {
        
        session()->forget('user');
        return redirect('login'); 
        
    }

}
