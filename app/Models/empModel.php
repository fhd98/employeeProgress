<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
/**
 * Description of empModel
 *
 * @author hp
 */
class empModel extends Model{
    //put your code here
    
    protected $table= 'employee_info';
    protected $primaryKey='employeeID';
    public $timestamps= false;
    
}
