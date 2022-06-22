<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;
use App\Models\empModel;

class loginController extends Controller
{
    //
    public function checkIfLogin(Request $request) {
        
        if ($request->session()->has('user')){
 //         dd(session()->all());exit;
//          echo "Already logged";

            
            $verify = loginModel::where('username', session('user'))->first();
            $countPending= empModel::where('status','pending')->count();
            $countApproved= empModel::where('status','approved')->count();
            $countRejected= empModel::where('status','rejected')->count();
            $countAll= empModel::count();
            
            
           // echo"<pre>";        print_r($countAll);exit;
            return view("dashboard", compact('verify','countPending','countApproved','countRejected','countAll'));
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
            
            $error="Invalid Username or Password. Try Again!";
            return view ('login', compact('error'));
        } else {
            $data = $request->input();
            $request->session()->put('user', $data['username']);
       
//putting deptname in session
            
            $adminDept = loginModel::select('department')
                           ->where('username', '=', $data['username'])
                           ->first();
            
        //echo $adminDept->department ; exit;
            //echo "<pre>"; print_r($adminDept);exit;
            session(['adminDeptName' => $adminDept->department]);
            
            
            $countPending= empModel::where('status','pending')->count();
            $countApproved= empModel::where('status','approved')->count();
            $countRejected= empModel::where('status','rejected')->count();
            $countAll= empModel::count();
            

            return view("dashboard", compact('verify','countPending','countApproved','countRejected','countAll'));
        }
        
    }
    public function adminLogout() {
        
        session()->forget('user');
        return redirect('login'); 
        
    }

}
