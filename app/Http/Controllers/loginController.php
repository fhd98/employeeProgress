<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;
use App\Models\empModel;
use App\Models\leavesModel;

class loginController extends Controller {

    
    public function checkIfLogin(Request $request) {

        if ($request->session()->has('user')) {
            


            $verify = loginModel::where('username', session('user'))->first();
            $countPending = empModel::where('status', 'pending')->where('department', session('adminDeptName'))->count();
            $countApproved = empModel::where('status', 'approved')->where('department', session('adminDeptName'))->count();
            $countRejected = empModel::where('status', 'rejected')->where('department', session('adminDeptName'))->count();
            $countAll = empModel::where('department', session('adminDeptName'))->count();

            $pendingLeaves= leavesModel::where('status', 'pending')->where('department', session('adminDeptName'))->count();
            
            
            return view("dashboard", compact('verify', 'countPending', 'countApproved', 'countRejected', 'countAll', 'pendingLeaves'));
        } else {
            return view('login');
        }
    }

    public function postLogin(Request $request) {

        

        $verify = loginModel::where('username', $request->username)->where('password', $request->password)->first();
        
        if (empty($verify)) {

            $error = "Invalid Username or Password. Try Again!";
            return view('login', compact('error'));
        } else {
            $data = $request->input();
            $request->session()->put('user', $data['username']);

//putting deptname in session

            $adminDept = loginModel::select('department','adminID')
                    ->where('username', '=', $data['username'])
                    ->first();

            
            session(['adminDeptName' => $adminDept->department]);
            session(['adminID' => $adminDept->adminID]);

            $countPending = empModel::where('status', 'pending')->where('department', session('adminDeptName'))->count();
            $countApproved = empModel::where('status', 'approved')->where('department', session('adminDeptName'))->count();
            $countRejected = empModel::where('status', 'rejected')->where('department', session('adminDeptName'))->count();
            $countAll = empModel::where('department', session('adminDeptName'))->count();

            $pendingLeaves= leavesModel::where('status', 'pending')->where('department', session('adminDeptName'))->count();

            return view("dashboard", compact('verify', 'countPending', 'countApproved', 'countRejected', 'countAll', 'pendingLeaves'));
        }
    }

    public function adminLogout() {

        session()->forget('user');
        return redirect('login');
    }

}
