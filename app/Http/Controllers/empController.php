<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\empModel;
use Illuminate\Support\Facades\DB;

/**
 * Description of empController
 *
 * @author hp
 */
class empController extends Controller {
    //put your code here
    public function pendingEmpDisplay() {
        
        if (session()->has('user')){

        
        $pendEmp= DB::table('employee_info')->where('status', 'pending')->get();

        return view ('pendingEmp', compact('pendEmp'));

        
    }
    
    else {
        $error="Please Login First!";
            return view ('login', compact('error'));
    }
    
}
}
