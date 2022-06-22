<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use App\Models\tasksModel;
use App\Models\empModel;

/**
 * Description of tasksController
 *
 * @author hp
 */
class tasksController extends Controller {
    //put your code here
    
    public function taskAssign() {

        if (session()->has('user')) {
            $deptName=(session('adminDeptName')); 
            //echo $deptName.'hello'; exit;
            
            $employeeList= empModel::where('department', $deptName)->where('status','approved')->get();
            //echo $employeeList;exit;
            
            return view('assignTask', compact('employeeList'));
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    }
    
}
