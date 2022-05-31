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


public function approvedEmpDisplay() {
        
        if (session()->has('user')){

        
        $appEmp= DB::table('employee_info')->where('status', 'approved')->get();

        return view ('approvedEmp', compact('appEmp'));

        
    }
    
    else {
        $error="Please Login First!";
            return view ('login', compact('error'));
    }    
}

public function allEmpDisplay() {
        
        if (session()->has('user')){

        
        $allEmp= DB::table('employee_info')->get();

        return view ('allEmp', compact('allEmp'));

        
    }
    
    else {
        $error="Please Login First!";
            return view ('login', compact('error'));
    }    
}

}
