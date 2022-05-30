<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 * Description of loginModel
 *
 * @author hp
 */
class loginModel extends Model {
    protected $table= 'admin_login';
    protected $primaryKey='adminID';
    public $timestamps= false;
    
    //put your code here
}
