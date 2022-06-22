<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;



/**
 * Description of tasksModel
 *
 * @author hp
 */
class tasksModel extends Model {
    //put your code here
    
    protected $table= 'tasks';
    protected $primaryKey='task_id';
    public $timestamps= false;
    
    public function store(Request $request){
        $ooTask= new tasksModel();
        
        $ooTask->emp_name=$request->assign_to;
        $ooTask->t_title=$request->t_title;
        $ooTask->t_details=$request->t_details;
        $ooTask->deadline=$request->deadline;
        $ooTask->department=session('adminDeptName');
               
        $ooTask->save();
         
    }
}
