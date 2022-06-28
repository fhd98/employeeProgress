<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use App\Models\empModel;
use App\Models\tasksModel;
use App\Models\leavesModel;

/**
 * Description of apiController
 *
 * @author hp
 */
class apiController extends Controller {

    //put your code here
    public function signup() {
        $post = request()->post();
        $oEmp = empModel::Store($post);
        return ['status' => 'pending'];
    }

    public function loginCheck() {
        $post = request()->post();
        $oEmp = empModel::where('e_email', $post['email'])->where('password', $post['password'])->first();

        if ($oEmp) {
            return["log" => "Success",
                "userDetails" => $oEmp];
        } else {
            return["status" => "Login Failed"];
        }
    }

    public function showTasks() {

        $post = request()->post();
        $oTask = tasksModel::where('emp_name', $post['empName'])->where('department', $post['empDept'])->get();
        return $oTask;
    }

    public function taskCompletion() {

        $data = request()->all();
        $oTask = tasksModel::where('task_id', $data)->update(['emp_comp_status' => 'completed']);

        return["status" => "Task Completed"];
    }

    public function taskProgress() {

        $data = request()->all();
        $oTask = tasksModel::where('task_id', $data)->update(['emp_comp_status' => 'in-progress']);

        return["status" => "Task Completed"];
    }

//    public function leaveApply() {
//        $post = request()->post();
//        $oLeave = leavesModel::Store($post);
//        return ['leave' => 'applied'];
//    }
    
//changed
    
     public function leaveApply() {
        $POST = request()->post();
        
        $validator = validator()->make($POST, [
            
            'daysLeave'=>'gt:0',
            'details' => 'required|min:5',            
            
                ],
                ['details.min' => 'Minimum 5 characters required in details',
                 'daysLeave.gt' => 'Number of Days must be greater than 0',]
        );
        if ($validator->fails()) {
            return ['leave' => $validator->errors()->first()];
        }
        else{
        $oLeave = leavesModel::Store($POST);
        return ['leave' => 'applied'];
    }
    
     }
    
    
    //unchanged

    public function leaveViewStatus() {
        $post = request()->post();
        $oLeave = leavesModel::where('emp_name', $post['empName'])->where('department', $post['empDept'])->get();
        return $oLeave;
    }

}
