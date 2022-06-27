<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\leavesModel;

/**
 * Description of leavesController
 *
 * @author hp
 */
class leavesController extends Controller{
    //put your code here
    
    public function pendingLeavesDisplay() {

        if (session()->has('user')) {
            $deptName=(session('adminDeptName'));             
            
            $data['pendingLeaves']= leavesModel::where('department', $deptName)->where('status','pending')->get();
             
            return view('pendingLeaves', $data);
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    }
    
    public function rejectLeave($id){
        $rejectLeave= leavesModel::where('leave_ID', $id)->update(['status'=>'rejected']);
        return redirect ('/pending-leaves');

    }
    
    public function approveLeave($id){
        $approveLeave= leavesModel::where('leave_ID', $id)->update(['status'=>'approved']);
        return redirect ('/pending-leaves');
    }
    
    public function leavesView(){
        if (session()->has('user')) {
            $deptName=(session('adminDeptName'));             
            
            $data['leavesView']= leavesModel::where('department', $deptName)->get();
             
            return view('leavesView', $data);
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    }
}
