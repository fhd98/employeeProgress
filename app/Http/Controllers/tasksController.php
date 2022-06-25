<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use App\Models\tasksModel;
use App\Models\empModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

/**
 * Description of tasksController
 *
 * @author hp
 */
class tasksController extends Controller {
    //put your code here
    
    public function taskAssign() {

        if (session()->has('user')) {
            //validation error
            
           //$error = session()->get('error'); 
           $data['postedData'] = session()->get('postedData'); 
           $data['error'] = '';
           $data['error'] = session()->get('error');
            
            
            $deptName=(session('adminDeptName'));             
            
            $data['employeeList']= empModel::where('department', $deptName)->where('status','approved')->get();
                     //echo "<pre>"; print_r($data);exit;
            //return view('assignTask', compact('employeeList'), compact('error'), $data);
            return view('assignTask', $data);
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
        }
    }
    

    
    public function taskPostAction(Request $request){
        
        $deptName=(session('adminDeptName')); 
        $POST = request()->post();
        $validator = validator()->make($POST, [
            't_title' => 'required|min:5',
            'deadline' => 'required|date|after:yesterday',
                ],
                ['t_title.required' => 'Title Required ',
                    't_title.min' => 'Minimum 5 characters required in title',]
        );

        if ($validator->fails()) {
            return redirect('/task-assign')->with([
                        'postedData' => $POST,
                        'error' => $validator->errors()->first()
            ]);
        }
        else {        
        
        $oTask=new tasksModel();
        $response=$oTask->store($request);
        
//        $oooDept= new tasksModel();
//        $oooDept->department=session('adminDeptName');
//        $oooDept->save();
        
        return redirect('task-view');
        }
    }
    
    
    public function taskViewAction() {
        
        if (session()->has('user')) {
               
            $deptName=(session('adminDeptName')); 
            $tasksList= tasksModel::where('department', $deptName)->get();
                     
            return view('tasksView', compact('tasksList'));
        } else {
            $error = "Please Login First!";
            return view('login', compact('error'));
    }
    
}
}