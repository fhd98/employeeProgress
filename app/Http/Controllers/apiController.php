<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Http\Controllers;

use App\Models\empModel;

/**
 * Description of apiController
 *
 * @author hp
 */
class apiController extends Controller {
    //put your code here
    public function signup(){
        $post=request()->post();
        $oEmp= empModel::Store($post);
        return ['status'=>'pending'];
    }
    
    public function loginCheck(){
        $post=request()->post();
        $oEmp= empModel::where('e_email',$post['email'])->where('password',$post['password'])->first();
        
        if ($oEmp){
            return["log"=>"Success",
                "userDetails"=>$oEmp];
        }
        else{
            return["status"=>"Login Failed"];
        }
    }
}
